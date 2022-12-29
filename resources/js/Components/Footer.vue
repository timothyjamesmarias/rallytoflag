<script setup>
import NavLink from '@/Components/NavLink.vue';
const links = [
  {
    name: 'Home',
    href: '/',
  },
  {
    name: 'About',
    href: '/about',
  },
  {
    name: 'Contact',
    href: '/contact',
  },
  {
    name: 'Help',
    href: '/help',
  },
];
</script>
<template>
<div class="p-4 flex align-center items-center justify-center w-full">
    <NavLink v-for="link in links" :href="link.href" class="px-4 sm:px-2">{{ link.name }}</NavLink>
</div>
</template>
