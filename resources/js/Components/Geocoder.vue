<style> 
</style>
<script setup>
import { onMounted } from 'vue';

const mapboxToken = import.meta.env.VITE_MAPBOX;

const props = defineProps({
  map: {
    type: Object,
    default: null,
    required: false,
  },
});

const initGeocoder = () => {
  const geocoder = new MapboxGeocoder({
    accessToken: mapboxToken,
    mapboxgl: mapboxgl,
    countries: 'us',
    types: 'address',
  });

}

onMounted(
  () => {
  initGeocoder();
});

</script>
<template>
  <div id="geocoder" @input="$emit('updateAddress', $event.target.value)"></div>
</template>
