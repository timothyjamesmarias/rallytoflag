import mapboxgl from 'mapbox-gl';
import 'mapbox-gl/dist/mapbox-gl.css';
import MapboxGeocoder from '@mapbox/mapbox-gl-geocoder';
import '@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css';

mapboxgl.accessToken = import.meta.env.VITE_MAP_BOX_API_KEY;

const container = document.getElementById('map');
if (container) {
  const map = new mapboxgl.Map({
      container: 'map', // container ID
      style: 'mapbox://styles/mapbox/light-v11', // style URL
      center: [-74.5, 40], // starting position [lng, lat]
      zoom: 5 // starting zoom
  });
}

var eventForm = document.getElementById('event-form');
if (eventForm) {

  var addressField = document.getElementById('address-field');

  const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    types: 'country,region,place,postcode,locality,neighborhood'
  });

  geocoder.addTo('#address-field');


  addressField = document.getElementsByClassName('mapboxgl-ctrl-geocoder--input');
  var addressFieldIcon = document.getElementsByClassName('mapboxgl-ctrl-geocoder--icon-search');
  var locationInput = document.getElementById('location');

  addressFieldIcon[0].remove();

  var currentAddress = locationInput.value;
  if (currentAddress) {
    addressField[0].value = currentAddress;
  }
  
  eventForm.onsubmit = function() {
    locationInput.value = addressField[0].value;
  }

}

