<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import EventTableRow from '@/Components/EventTableRow.vue';
import Card from '@/Components/Card.vue';
import Paginator from '@/Components/Paginator.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const props = defineProps({
    user: Object,
    events: Object,
});

</script>

<template>
<Head title="Dashboard" />
<div class="flex flex-col items-center pt-6">
  <div v-if="$page.props.flash.success" class="p-4 border border-2 rounded-lg bg-green-300 dark:bg-green-600 border-green-900 opacity-80">
    {{ $page.props.flash.success }}
  </div>
  <div v-if="$page.props.flash.error" class="p-4 border border-2 rounded-lg bg-red-300 dark:bg-red-600 border-red-900 opacity-80">
    {{ $page.props.flash.error }}
  </div>
  <div class="w-full lg:md:max-w-4xl sm:max-w-md">
    <div class="flex justify-between">
    <h1 class="text-xl font-bold">My Dashboard</h1>
    <PrimaryButton v-if="$page.props.auth.user.is_admin"><Link :href="route('admin')" v-html="'Admin Dashboard'"/></PrimaryButton>
    <PrimaryButton><Link :href="route('profile.edit')" v-html="'Account Settings'"/></PrimaryButton>
    </div>
</div>
</div>
<Card class="text-left">
  <div class="flex justify-between">
    <h2 class="text-xl font-bold">My Events</h2>
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
</template>
