<style> 
</style>
<script setup>
import { onMounted } from 'vue';

const emit = defineEmits(['update:address']);
const mapboxToken = import.meta.env.VITE_MAPBOX;

defineProps({
  address: {
    type: String,
    required: true,
  },
});

function updateAddress(e) {
  emit('update:address', e.target.value);
}

const initGeocoder = () => {
  const geocoder = new MapboxGeocoder({
    accessToken: mapboxToken,
    countries: 'us',
    types: 'address',
  });

  geocoder.addTo('#geocoder');
  $('.mapboxgl-ctrl-geocoder--icon-search').remove();
  $('.mapboxgl-ctrl-geocoder--input')
    .addClass("w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none")
    .removeClass("mapboxgl-ctrl-geocoder--input");
  $('.mapboxgl-ctrl-geocoder--button')
    .addClass("bg-white dark:bg-neutral-700")
  $('.mapboxgl-ctrl-geocoder--icon-close')
    .addClass("bg-white dark:bg-neutral-700")
}

onMounted(
  () => {
  initGeocoder();
});

</script>
<template>
  <div id="geocoder" @change="updateAddress"></div>
</template>
