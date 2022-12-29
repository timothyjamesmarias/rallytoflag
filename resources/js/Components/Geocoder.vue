<style> 
.mapboxgl-ctrl-geocoder--suggestion:hover {
  cursor: pointer;
  background-color: #78716c;
  overflow: hidden;
}
</style>
<script setup>
import { onMounted } from 'vue';
const props = defineProps({});

const emits = defineEmits(['input']);
const mapboxToken = import.meta.env.VITE_MAPBOX;

const initGeocoder = () => {
  const geocoder = new MapboxGeocoder({
    accessToken: mapboxToken,
    countries: 'us',
    types: 'address',
  });

  geocoder.addTo('#geocoder');
  $('.mapboxgl-ctrl-geocoder--icon-search').remove();
  $('.mapboxgl-ctrl-geocoder--input')
    .addClass("border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none")
    .removeClass("mapboxgl-ctrl-geocoder--input");
  $('.mapboxgl-ctrl-geocoder')
    .removeClass("mapboxgl-ctrl")
    .removeClass("mapboxgl-ctrl-geocoder");
    $('.mapboxgl-ctrl-geocoder--pin-right').remove();
    $('.suggestions').addClass("bg-white dark:bg-neutral-700 rounded absolute z-10");
    $('.suggestions').removeClass("suggestions");
}

onMounted(
  () => {
  initGeocoder();
});
</script>
<template>
  <div id="geocoder"></div>
</template>
