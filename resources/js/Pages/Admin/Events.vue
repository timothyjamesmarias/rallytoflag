<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Card from '@/Components/Card.vue'
import Paginator from '@/Components/Paginator.vue'
import EventTableRow from '@/Components/EventTableRow.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
defineProps({
  events: {
    type: Object,
    required: true,
    }
});
</script>
<template>
<AdminLayout>
<Card class="text-left">
  <div class="flex justify-between">
    <h2 class="text-xl font-bold">Events</h2>
    <PrimaryButton><Link :href="route('event.create')" v-html="'Add Event'"/></PrimaryButton>
  </div>
  <table class="w-full">
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
</AdminLayout>
</template>
