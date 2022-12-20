<script setup>
const props = defineProps({
  event: Object,
  images: Array,
});
</script>
<template>
<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pb-10">
  <div class="text-lg text-gray-900 dark:text-gray-400 w-full lg:md:max-w-4xl sm:max-w-md">
    <div v-if="images.length > 0" class="flex flex-wrap justify-center">
      <div v-for="image in images" :key="image.id" class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 p-2">
        <img :src="'/storage/' + image.path" class="w-full h-auto" />
      </div>
    </div>
    <div class="text-xl pb-2 pt-10">
      <p v-if="event.end_date !== null">{{ event.start_date }} until {{ event.end_date }}</p>
      <p v-else>{{ event.start_date }}</p>
      <p v-if="event.start_time !== null">Starts at: {{ event.start_time }}</p>
    </div>

    <p class="pt-2 pb-4">
      {{ event.location }}
    </p>

    <a v-if="event.url !== null" :href="event.url" class="underline text-violet-700 dark:text-violet-500">
      {{ event.url }}
    </a>

    <p class="pt-4 leading-loose break-words">
      {{ event.description }}
    </p>
  </div> 
</div>
</template>
