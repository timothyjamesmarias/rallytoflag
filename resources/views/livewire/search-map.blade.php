<div id="map-container">
  <div id="map"></div>
</div>
@push('scripts')
<script>

  mapboxgl.accessToken = "{{ env('VITE_MAP_BOX_API_KEY') }}";

  const map = new mapboxgl.Map({
      container: 'map', // container ID
      style: 'mapbox://styles/mapbox/light-v11', // style URL
      center: [-74.5, 40], // starting position [lng, lat]
      zoom: 5 // starting zoom
  });

  const geocoder = new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl,
      marker: false,
      placeholder: 'Search for a location',
      bbox: [-74.5, 40, -73.5, 41],
      proximity: {
          longitude: -74.5,
          latitude: 40
      }
  });
  document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
</script>
<style>
#map-container {
  position: relative;
  height: 400px;
  max-width: 100%;
}
#map { 
  position: absolute; 
  top: 0; 
  bottom: 0; 
  width: 100%; 
}
</style>
@endpush
