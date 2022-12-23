<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import EventTableRow from '@/Components/EventTableRow.vue';
import Card from '@/Components/Card.vue';
import Paginator from '@/Components/Paginator.vue';
const props = defineProps({
    user: Object,
    events: Object,
});
</script>

<template>
<Head title="Dashboard" />

<Card class="text-left">
  <h2 class="text-xl font-bold">My Events</h2>

  <table class="table-fixed w-full">
    <thead>
      <tr class="font-bold">
        <th>Image</th>
        <th>Title</th>
        <th class="xs:hidden">Date</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <EventTableRow v-for="event in events.data" v-key="event.id" :event="event" />
    </tbody>
  </table>
  <div>
  </div>
  <Paginator :links="events.links" />
</Card>
</template>
