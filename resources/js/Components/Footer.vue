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
  {
    name: 'Terms of Service',
    href: '/terms',
  },
];
</script>
<template>
<div class="p-4 flex flex-wrap align-center items-center justify-center w-full">
    <NavLink v-for="link in links" :href="link.href" class="px-2 sm:px-4">{{ link.name }}</NavLink>
</div>
</template>
