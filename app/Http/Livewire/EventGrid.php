<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventImage;
use Livewire\WithPagination;

class EventGrid extends Component
{
    use withPagination;


    public $search = '';
    protected $queryString = ['search'];

    
    public function  updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.event-grid', [
        'events' => Event::query()
          ->where('title', 'like', '%' . $this->search . '%')
          ->addSelect(['image' => EventImage::select('path')
            ->whereColumn('event_id', 'events.id')
            ->limit(1)
          ])
          ->orderBy('created_at', 'desc')
          ->paginate(3)
        ]);
    }
}
