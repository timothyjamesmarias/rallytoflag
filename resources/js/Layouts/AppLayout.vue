<script setup>
import NavBar from '@/Components/NavBar.vue';

</script>

<template>
<div class="bg-stone-100 dark:bg-stone-900 text-gray-700 dark:text-gray-300">
  <NavBar />
  <main class="min-h-screen">
    <slot />
  </main>
</div>
</template>
