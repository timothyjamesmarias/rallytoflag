<style> 
.mapboxgl-ctrl-geocoder--suggestion {
  
}
.mapboxgl-ctrl-geocoder--suggestion:hover {
  cursor: pointer;
  background-color: #78716c;
}
#map-container {
  height: 400px;
  width: 100%;
}
#map {
  height: 100%;
  width: 100%;
}
</style>

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

  $('.mapboxgl-ctrl-geocoder--icon-search').remove();
  $('.mapboxgl-ctrl-geocoder--input')
    .addClass("w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none")
    .removeClass("mapboxgl-ctrl-geocoder--input");
  $('.mapboxgl-ctrl-geocoder')
    .addClass("w-full ")
    .removeClass("mapboxgl-ctrl")
    .removeClass("mapboxgl-ctrl-geocoder");
    $('.mapboxgl-ctrl-geocoder--pin-right').remove();
    $('.suggestions').addClass("bg-white dark:bg-neutral-700 rounded absolute z-10");
    $('.suggestions').removeClass("suggestions");
});

const search = ref('');
const start_date = ref('');

watch(
  () => [search.value, start_date.value],
  ([search, start_date]) => {
    Inertia.get('/events', {search: search, date: start_date}, {
      preserveState: true,
      replace: true,
    });
  },
  {immediate: true}
);

</script>
<template>
<div id="map-container">
  <div id="map"></div>
</div>
<div class="grid lg:md:sm:grid-cols-12 xs:grid-cols-1 gap-4 p-4">
  <div class="col-span-2 flex flex-col">
    <InputLabel for="geocoder" value="Filter by location" class=""/>
    <div id="geocoder" @input="event => search = event.target.value"></div>
    <InputLabel for="start_date" value="Filter by date" class="mt-4"/>
    <Input type="date" id="start_date" name="start_date" v-model="start_date" class="mt-2"/>
  </div>

  <div class="col-span-10">
    <div class="grid lg:grid-cols-3 md:sm:grid-cols-2 xs:grid-cols-1 gap-4">
      <EventCard v-for="event in events.data" :key="event.id" :event="event" />
    </div>
  </div>
</div>
</template>
