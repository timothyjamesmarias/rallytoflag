<x-card>
<form method="POST" action="{{ route('event.store') }}"
class="" enctype="multipart/form-data" id="event-form">
  @csrf

  <x-input-label for="title" :value="__('Title')" />
  <x-input id="title" type="text" class="w-full"
    name="title" :value="old('title')" required autofocus/>
  <x-input-error :messages="$errors->get('title')" class="mt-2" />

  <x-input-label for="location" :value="__('Address')" />
  <div id="geocoder" >
  </div>
  <pre id="result"></pre>
  <x-input-error :messages="$errors->get('location')" class="mt-2" />

  <x-input-label for="url" :value="__('Link to website (optional)')" />
  <x-input id="url" type="text" class="w-full"
    name="url" :value="old('url')"/>
  <x-input-error :messages="$errors->get('url')" class="mt-2" />

  <x-input-label for="description" :value="__('Description')" />
  <x-text-area-input id="description" name="description" class="w-full" required />
  <x-input-error :messages="$errors->get('description')" class="mt-2" />

  <div class="flex mb-3">
    <div class="w-1/2 pr-2">
      <x-input-label for="start_date" :value="__('Start Date')" />
      <x-input :type="'datetime-local'" class="w-full" id="start_date" name="start_date" 
      :value="old('start_date')"/>
      <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
    </div>

    <div class="w-1/2 pl-2">
      <x-input-label for="end_date" :value="__('End Date')"/>
      <x-input :type="'datetime-local'" class="w-full" id="end_date" name="end_date" 
      :value="old('end_date')"/>
      <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
    </div>
  </div>

  <div>
    <x-input-label for="images" :value="__('Images')" />
    <input id="images" type="file" name="images[]" multiple />
    <x-input-error :messages="$errors->get('images')" class="mt-2" />
  </div>

  <x-primary-button class="float-right mt-3">
    Create
  </x-primary-button>

</form> 
</x-card>
