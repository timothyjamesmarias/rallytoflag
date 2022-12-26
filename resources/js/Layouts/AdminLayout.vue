<script setup>
import AdminLink from '@/Components/AdminLink.vue'
</script>
<template>
<div class="flex pt-6">
  <div class="flex flex-col sm:w-3/12 lg:w-2/12 pr-4 text-left">
    <div class="">
    <AdminLink :href="route('admin')">Dashboard</AdminLink>
    <AdminLink :href="route('admin.users')">Users</AdminLink>
    <AdminLink :href="route('admin.events')">Events</AdminLink>
    </div>
  </div>
  <div class="block sm:w-9/12 w-10/12">
    <slot />
  </div>
</div>
</template>
