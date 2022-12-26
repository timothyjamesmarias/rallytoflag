<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import EventCard from '@/Components/EventCard.vue';
import {ref, computed, onMounted, onBeforeUnmount, watch} from 'vue';
import {Inertia} from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3'
const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
        required: false,
    },
});

const mapboxToken = import.meta.env.VITE_MAPBOX;
mapboxgl.accessToken = mapboxToken;

onMounted(() => {
  const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v12', // style URL
    center: [-74.5, 40], // starting position [lng, lat]
    zoom: 5, // starting zoom
  });

  const geocoder = new MapboxGeocoder({
    accessToken: mapboxToken,
    mapboxgl: mapboxgl,
    types: 'country,region,place,postcode,locality,neighborhood',
  });

  document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
});

const search = ref(props.filters.search);

watch(search, value => {
  Inertia.get('/events', {search: value}, {
  preserveState: true,
  replace: true,
  });
});

</script>
<template>
<div id="map-container">
  <div id="map"></div>
</div>
<div class="grid lg:md:sm:grid-cols-12 xs:grid-cols-1 gap-4 p-4">
  <div class="col-span-2 flex flex-col">
    <InputLabel for="geocoder" value="Filter by location" class=""/>
    <div id="geocoder" @input="event => search = event.target.value"></div>
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
#map {
  height: 100%;
  width: 100%;
}
</style>
