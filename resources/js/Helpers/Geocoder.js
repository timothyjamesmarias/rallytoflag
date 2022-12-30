export default function setupGeocoder() {
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
