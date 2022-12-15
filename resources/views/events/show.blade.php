<x-layouts.app>
  <x-slot name="header">
      {{ $event->title }}
  </x-slot>

<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pb-10">

  <div class="text-lg text-gray-900 dark:text-gray-400 w-full lg:md:max-w-4xl sm:max-w-md">

    @if ($images)
    <div id="gallery">
      @if (count($images) > 1)
        @if (count($images) % 2 == 0)
        <div class="grid grid-cols-2 gap-2 xs:grid-cols-1">
        @else
        <div class="grid grid-cols-3 gap-2 xs:grid-cols-1">
        @endif
      @else
      <div>
      @endif
      @foreach ($images as $image)
          <a href="/storage/{{ $image->path }}">
            <img src="/storage/{{ $image->path }}" alt="{{ $image->alt }}" 
            class="min-h-full object-cover border border-gray-400 dark:border-gray-800 rounded-md shadow dark:shadow-none">
          </a>
      @endforeach
      </div>
    </div>
    @endif

    <div class="text-xl flex align-center pb-2 pt-10">
      <div class="flex flex-wrap pr-6">
        <strong class="dark:text-gray-300 pr-2">Start:</strong>
        <p>
        {{ $event->start_date }}
        </p>
      </div> 
      <div class="flex flex-wrap">
        <strong class="dark:text-gray-300 pr-2">End:</strong>
        <p>
        {{ $event->end_date }}
        </p>
      </div> 
    </div>

    <p class="pt-2 pb-4">
      {{ $event->location }}
    </p>

    @if ($event->url)
    <a href="{{ $event->url }}" class="underline text-violet-700 dark:text-violet-500">
      {{ $event->url }}
    </a>
    @endif

    <p class="pt-4 leading-loose break-words">
      {{ $event->description }}
    </p>
  </div> 
</div>
  
</x-layouts.app>
