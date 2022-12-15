<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
  <div>
      {{ $logo }}
  </div>

  <div class="w-full lg:md:max-w-xl sm:max-w-md 
    bg-neutral-100 dark:bg-neutral-800 border border-indigo-900 dark:border-indigo-600
    drop-shadow-md dark:drop-shadow-none
    mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
      {{ $slot }}
  </div>
</div>
