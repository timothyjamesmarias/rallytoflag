<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SearchInput from '@/Components/SearchInput.vue';
import InputError from '@/Components/InputError.vue';
import DateInput from '@/Components/DateInput.vue';
import EventCard from '@/Components/EventCard.vue';
</script>
<template>
<div class="grid lg:md:sm:grid-cols-12 xs:grid-cols-1 gap-4">
  <div class="col-span-2 flex flex-col">
    <div>
    </div>
    <x-input-label for="search" value="Filter by name" />
    <x-input type="search" wire:model="search" placeholder="Search..." 
    class="mb-4" />
    <x-input-label for="location" value="Filter by location" />
    <x-input type="search" wire:model="location" placeholder="Search..." 
    class="mb-4" />
  </div>

  <div class="col-span-10">
    <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
      <EventCard v-for="event in events" :key="event.id" :event="event" />
    </div>
    <div class="my-4">
    </div>
  </div>
</div>
</template>
