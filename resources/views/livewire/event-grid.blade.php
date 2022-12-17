<div>
  <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
  @foreach($events as $event)
  <x-event-card :event="$event" />
  @endforeach
  </div>
</div>
