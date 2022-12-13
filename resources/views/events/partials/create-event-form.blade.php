<x-event-card>
<form method="POST" action="{{ route('event.store') }}"
class="" enctype="multipart/form-data" id="event-form">
  @csrf

  <x-input-label for="title" :value="__('Title')" />
  <x-input id="title" type="text" class="w-full"
    name="title" required autofocus/>
  <x-input-error :messages="$errors->get('title')" class="mt-2" />

  <x-input-label for="location" :value="__('Location')" />
  <x-input id="location" type="text" class="w-full"
    name="location" required />
  <x-input-error :messages="$errors->get('location')" class="mt-2" />

  <x-input-label for="description" :value="__('Description')" />
  <x-text-area-input id="description" name="description" class="w-full" required />
  <x-input-error :messages="$errors->get('description')" class="mt-2" />

  <x-input-label for="start_date" :value="__('Start Date')" />
  <x-input :type="'datetime-local'" class="w-full" id="start_date" name="start_date" />
  <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

  <x-input-label for="end_date" :value="__('End Date')"/>
  <x-input :type="'datetime-local'" class="w-full" id="end_date" name="end_date" />
  <x-input-error :messages="$errors->get('end_date')" class="mt-2" />

  <x-input-label for="images" :value="__('Images')" />
  <input id="images" type="file" name="images[]" multiple />
  <x-input-error :messages="$errors->get('images')" class="mt-2" />

  <x-primary-button class="mt-3">
    Create
  </x-primary-button>

</form> 
</x-event-card>