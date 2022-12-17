@props(['event' => $event])

<a href="{{ route('event.show', $event) }}"class="xl:lg:md:sm:max-h-[400px] xs:max-h-[200px] 
border border-gray-500 hover:border-gray-800 dark:hover:border-gray-300 rounded-lg">
<div class="min-h-full rounded-lg bg-neutral-100 dark:bg-neutral-800">
  @if ($event->image)
  <img src="/storage/{{ $event->image }}" alt="event image" 
  class="xl:lg:md:sm:max-h-[200px] xs:max-h-[100px] object-cover w-full rounded-t-lg" />
  @endif

  <div class="flex flex-col p-4">
    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 pb-1">{{ $event->title }}</h3>
    <p class="text-gray-700 dark:text-gray-300 pb-1">{{ $event->location }}</p>
    <p class="text-gray-700 dark:text-gray-300 pb-1"><strong>Start: </strong>{{ $event->start_date }}</p>
    <p class="text-gray-700 dark:text-gray-300 pb-1"><strong>End: </strong>{{ $event->end_date }}</p>
    <p class="text-gray-700 dark:text-gray-300"><strong>Posted on: </strong>{{ $event->created_at }}</p>
  </div>
</div>
</a>
