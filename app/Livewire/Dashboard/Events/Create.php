<?php

namespace App\Livewire\Dashboard\Events;

use App\Livewire\Forms\EventForm;
use App\Models\Category;
use App\Models\Event;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    public EventForm $form;

    public $orgSearch;

    public $success;

    public $currentCategoryId;

    public $subcategoriesIds = [];

    public function addSub($id)
    {
        $this->subcategoriesIds[] = $id;
        $this->form->subcategories[] = Subcategory::with('category')->findOrFail($id);
    }

    public function removeSub($id)
    {
        $this->form->subcategories[] = $id;
    }

    public function store()
    {
        $this->validate();

        $this->form->description = str_replace('\n', '</p><p>', $this->form->description);

        $this->form->slug = str_replace(' ', '-', $this->form->name);

        $this->success = Event::create($this->form->except(['event', 'subcategories']));
        $this->success->subcategories()->syncWithoutDetaching($this->subcategoriesIds);

        if($this->success){
            Session::flash('success', 'Event created successfully.');
        };

    }

    public function render()
    {

        $orgSearch = $this->orgSearch;

        $subcategories = $this->subcategoriesIds;

        return view('livewire.dashboard.events.create', [
            'organizers'      => User::where('role', 'organizer')
                                    ->when($orgSearch, function($q) use ($orgSearch) {
                                        $q->where('first_name', 'like', "%$orgSearch%")
                                            ->orWhere('last_name', 'like', "%$orgSearch");
                                    })
                                    ->orderBy('first_name')
                                    ->get(),
            'categories'      => Category::whereHas('subcategories', function($q) use ($subcategories) {
                                        $q->whereIn('id', $subcategories);
                                    })->get(),
            'allCategories'   => Category::orderby('name', 'asc')->get(),
            'currentCategory' => $this->currentCategoryId ? Category::with(['subcategories'])
                                    ->findOrFail($this->currentCategoryId) : Category::with(['subcategories'])
                                    ->orderBy('name')
                                    ->firstOrFail(),
        ]);
    }
}
