<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::query()
            ->with('user')
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.projects', [
            'projects' => $projects,
        ])->layout('layouts.admin');
    }
}
