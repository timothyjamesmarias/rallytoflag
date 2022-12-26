<script setup>
import SecondaryButton from './SecondaryButton.vue';
import DangerButton from './DangerButton.vue';
const props = defineProps({
    user: Object,
});
const deleteUser = () => {
  console.log('delete');
};
</script>
<template>
<tr class="table-fixed">
  <td class="py-2">{{ user.name }}</td>
  <td class="break-words">{{ user.email }}</td>
  <td class="break-words">{{ user.created_at }}</td>
  <td class="break-words">{{ user.created_at }}</td>
  <td class="break-words">{{ user.updated_at }}</td>
  <td class="break-words">{{ user.email_verified_at }}</td>
  <td v-if="$page.props.auth.user.id !== user.id"><DangerButton @click="deleteUser">Delete Account</DangerButton></td>
</tr>
</template>
