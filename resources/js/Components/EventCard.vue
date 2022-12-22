<script setup>
const props = defineProps({
    event: {
        type: Object,
        required: true,
    },
});
</script>
<template>
<a :href="route('event.show', event.id)" class="xl:lg:md:sm:max-h-[400px] xs:max-h-[200px] 
border border-gray-500 hover:border-violet-800 dark:hover:border-violet-300 rounded-lg">
<div class="min-h-full rounded-lg bg-neutral-100 dark:bg-neutral-800">
  <img v-if="event.image !== null" :src="'/storage/' + event.image" alt="event image" 
  class="xl:lg:md:sm:max-h-[200px] xs:max-h-[100px] object-cover w-full rounded-t-lg" />
  <img v-else src="castle.png" alt="event image" 
  class="xl:lg:md:sm:max-h-[200px] xs:max-h-[100px] object-cover w-full rounded-t-lg" />

  <div class="flex flex-col p-4">
    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 pb-1">{{ event.title }}</h3>
    <p class="text-gray-700 dark:text-gray-300 pb-1">{{ event.location }}</p>
    <p class="text-gray-700 dark:text-gray-300 pb-1"><strong>Starts on </strong>{{ event.start_date }}</p>
    <p v-if="event.end_date !== null" class="text-gray-700 dark:text-gray-300 pb-1"><strong>Ends on </strong>{{ event.end_date }}</p>
    <p class="text-gray-700 dark:text-gray-300">Posted on {{ event.created_at }}</p>
  </div>
</div>
</a>
</template>
