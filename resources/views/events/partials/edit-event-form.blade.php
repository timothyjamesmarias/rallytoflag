<x-card>
<form method="POST" action="{{ route('event.update', $event) }}"
class="" enctype="multipart/form-data" id="event-form">
  @csrf

  @method ('PATCH')

  <x-input-label for="title" :value="__('Title')" />
  <x-input id="title" type="text" class="w-full"
    name="title" :value="old('title', $event->title)" required autofocus/>
  <x-input-error :messages="$errors->get('title')" class="mt-2" />

  <x-input-label for="location" :value="__('Address')" />
  <div id="address-field" >
    <x-input id="location" type="hidden" 
      name="location" :value="old('location', $event->location)" required />
  </div>
  <x-input-error :messages="$errors->get('location')" class="mt-2" />

  <x-input-label for="url" :value="__('Link to website (optional)')" />
  <x-input id="url" type="text" class="w-full"
    name="url" :value="old('url', $event->url)"/>
  <x-input-error :messages="$errors->get('url')" class="mt-2" />

  <x-input-label for="description" :value="__('Description')" />
  <x-text-area-input id="description" name="description" class="w-full" required>
    {{ old('description', $event->description) }}
  </x-text-area-input>
  <x-input-error :messages="$errors->get('description')" class="mt-2" />

  <div class="flex mb-3">
    <div class="w-1/2 pr-2">
      <x-input-label for="start_date" :value="__('Start Date')" />
      <x-input :type="'date'" class="w-full" id="start_date" name="start_date" 
      :value="old('start_date', $event->start_date)"/>
      <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
    </div>

    <div class="w-1/2 pl-2">
      <x-input-label for="end_date" :value="__('End Date')"/>
      <x-input :type="'date'" class="w-full" id="end_date" name="end_date" 
      :value="old('end_date', $event->end_date)"/>
      <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
    </div>
  </div>

  <div>
    <x-input-label for="images" :value="__('Images')" />
    <input id="images" type="file" name="images[]" multiple />
    <x-input-error :messages="$errors->get('images')" class="mt-2" />
  </div>

  <x-primary-button class="float-right mt-3">
    Update
  </x-primary-button>

</form> 
<style>
  /*
   * const classes = ['border-gray-300', 
   * 'focus:border-violet-500', 'focus:ring-violet-500', 'rounded-md', 
   * 'bg-white', 'dark:bg-neutral-200', 'drop-shadow-sm', 'dark:drop-shadow-none' ];
   */
.mapboxgl-ctrl-geocoder {
  min-width: 100%;
}

.mapboxgl-ctrl-geocoder:focus {
  outline: none;
  border: 1px solid;
}

.mapboxgl-ctrl-geocoder--input {
  background-color: rgb(255 255 255) !important;
  border-color: rgb(209 213 219) !important;
  border-radius: 0.25rem;
  padding: 1.3rem;
  width: 100%;
  filter: drop-shadow(0 1px 1px rgb(0 0 0 / 0.05));
}

.mapboxgl-ctrl-geocoder--input:focus {
  border-color: rgb(139 92 246) !important;
  box-shadow: 0 0 0 3px rgb(139 92 246 / 50%) !important;
}

.mapboxgl-ctrl-geocoder--input, .dark {
  background-color: rgb(229 229 229);
  filter: drop-shadow(0 0 #0000);
}
</style>
</x-card>
