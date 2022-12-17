<div class="grid lg:md:sm:grid-cols-12 xs:grid-cols-1 gap-4">
  <div class="col-span-2 flex flex-col">
    <div>
    </div>
    <x-input type="search" wire:model="search" placeholder="Search by name..." 
    class="mb-4" />
    <x-input type="date" wire:model="date" placeholder="Search events by date..." 
    class="mb-4"/>
  </div>

  <div class="col-span-10">
    <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
    @foreach($events as $event)
    <x-event-card :event="$event" />
    @endforeach
    </div>
    <div class="my-4">
    {{ $events->links() }}
    </div>
  </div>
</div>
