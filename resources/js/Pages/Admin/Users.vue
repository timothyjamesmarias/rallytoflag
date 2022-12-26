<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Card from '@/Components/Card.vue'
import Paginator from '@/Components/Paginator.vue'
import UsersTableRow from '@/Components/UsersTableRow.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
defineProps({
  users: {
    type: Object,
    required: true,
    }
});
</script>
<template>
<AdminLayout>
<Card class="text-left max-w-7xl">
  <h2 class="text-xl font-bold">Users</h2>
  <table class="w-full">
    <thead>
      <tr class="font-bold">
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Email Verified At</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <UsersTableRow v-for="user in users.data" v-key="user.id" :user="user" />
    </tbody>
  </table>
  <div>
  </div>
  <Paginator :links="users.links" />
</Card>
</AdminLayout>
</template>
