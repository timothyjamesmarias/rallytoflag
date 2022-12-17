@props(['event' => $event])

<a href="{{ route('event.show', $event) }}"class="xl:lg:md:sm:max-h-[400px] xs:max-h-[200px] 
hover:border hover:ring-gray-100 rounded-lg">
<div class="min-h-full rounded-lg bg-white dark:bg-neutral-800">
  @if ($event->image)
  <img src="/storage/{{ $event->image }}" alt="event image" 
  class="xl:lg:md:sm:max-h-[200px] xs:max-h-[100px] object-cover w-full rounded-t-lg" />
  @endif

  <div class="flex flex-col p-4">
    <h3 class="text-lg font-bold">{{ $event->title }}</h3>
    <p class="text-gray-500">{{ $event->location }}</p>
    <p class="text-gray-500">{{ $event->start_date }}</p>
    <p class="text-gray-500">{{ $event->end_date }}</p>
  </div>
</div>
</a>
