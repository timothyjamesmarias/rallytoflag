<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SearchInput from '@/Components/SearchInput.vue';
import InputError from '@/Components/InputError.vue';
import DateInput from '@/Components/DateInput.vue';
import EventCard from '@/Components/EventCard.vue';
import {ref, onMounted, onBeforeUnmount, watch} from 'vue';
import {Inertia} from '@inertiajs/inertia';

const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
});

const search = ref('');

watch(search, value => {
  Inertia.get('/events', {search: value}, {
  preserveState: true,
  });
});

</script>
<template>
<div id="map-container">
  <div id="map"></div>
</div>
<div class="grid lg:md:sm:grid-cols-12 xs:grid-cols-1 gap-4 p-4">
  <div class="col-span-2 flex flex-col">
    <InputLabel for="search" label="Search" />
    <TextInput
      type="search"
      id="search"
      placeholder="Search..."
      v-model="search"
      class="mb-4"/>
  </div>
  <div class="col-span-10">
    <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
      <EventCard v-for="event in events.data" :key="event.id" :event="event" />
    </div>
  </div>
</div>
</template>
<style scoped>
#map-container {
  height: 400px;
  width: 100%;
}
</style>
