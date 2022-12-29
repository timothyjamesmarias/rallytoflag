<style> 
.mapboxgl-ctrl-geocoder--suggestion:hover {
  cursor: pointer;
  background-color: #78716c;
}
</style>
<script setup>
import { onMounted } from 'vue';
const props = defineProps({
  map:{
    type: Object,
    required: false,
  },
  token: {
    type: String,
    required: true,
  },
});

const emits = defineEmits(['input']);
//mapboxgl.accessToken = props.token;

const initGeocoder = () => {
  const geocoder = new MapboxGeocoder({
    accessToken: props.token,
    mapboxgl: mapboxgl,
    countries: 'us',
    types: 'address',
  });

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

  if (props.map) {
    document.getElementById('geocoder').appendChild(geocoder.onAdd(props.map));
  }
}

onMounted(
  () => {
  initGeocoder();
});
</script>
<template>
  <div id="geocoder" class="w-full"></div>
</template>
