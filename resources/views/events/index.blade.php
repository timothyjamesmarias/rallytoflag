<x-layouts.app>
<div id="map-container">
<div id="map" ></div>
</div>

<div class="px-4">
  <div>
  </div>

  <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
  @foreach($events as $event)
  <x-search-card :event="$event" />
  @endforeach
  </div>

</div>

</x-layouts.app>
