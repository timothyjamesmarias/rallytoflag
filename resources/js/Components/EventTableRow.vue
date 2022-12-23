<script setup>
import SecondaryButton from './SecondaryButton.vue';
import DangerButton from './DangerButton.vue';
const props = defineProps({
    event: Object,
});
const editEvent = () => {
  console.log('edit');
};
const deleteEvent = () => {
  console.log('delete');
};
</script>
<template>
<tr>
  <td class="py-2">
    <a :href="route('event.show', event.id)">
      <img v-if="event.image !== null" :src="'/storage/' + event.image" class="w-10 h-10 rounded" />
      <img v-else src="/castle.png" class="w-10 h-10 rounded" />
    </a>
  </td>
  <td class="break-words">{{ event.title }}</td>
  <td class="xs:hidden">{{ event.start_date }}</td>
  <td><SecondaryButton @click="editEvent">Edit</SecondaryButton></td>
  <td><DangerButton @click="deleteEvent">Delete</DangerButton></td>
</tr>
</template>
