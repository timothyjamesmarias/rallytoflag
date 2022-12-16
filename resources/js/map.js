import mapboxgl from 'mapbox-gl';
import 'mapbox-gl/dist/mapbox-gl.css';
import MapboxGeocoder from '@mapbox/mapbox-gl-geocoder';
import '@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css';

mapboxgl.accessToken = import.meta.env.VITE_MAP_BOX_API_KEY;

const container = document.getElementById('map');
if (container) {
  const map = new mapboxgl.Map({
      container: 'map', // container ID
      style: 'mapbox://styles/mapbox/streets-v12', // style URL
      center: [-74.5, 40], // starting position [lng, lat]
      zoom: 5 // starting zoom
  });
}

const addressField = document.getElementById('address-field');
if (addressField) {

  const classes =['border-gray-300', 'focus:border-violet-500', 'focus:ring-violet-500', 'rounded-md',
    'bg-white', 'dark:bg-neutral-200', 'drop-shadow-sm', 'dark:drop-shadow-none', 'w-full'];

  const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    types: 'country,region,place,postcode,locality,neighborhood'
  });

  geocoder.addTo('#address-field');

  // Get the geocoder results container.
  const results = document.getElementById('result');

  // Add geocoder result to container.
  geocoder.on('result', (e) => {
  results.innerText = JSON.stringify(e.result, null, 2);
  });

  const addressField = document.getElementsByClassName('mapboxgl-ctrl-geocoder--input');
  const addressFieldIcon = document.getElementsByClassName('mapboxgl-ctrl-geocoder--icon');
  const addressFieldContainer = document.getElementsByClassName('mapboxgl-ctrl-geocoder');
  const locationInput = document.getElementById('location');
  const form = document.getElementById('event-form');


  form.onsubmit = function() {
    locationInput.value = addressField[0].value;
  }

}

