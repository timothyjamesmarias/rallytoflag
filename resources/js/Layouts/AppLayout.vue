<script setup>
import NavBar from '@/Components/NavBar.vue';
</script>

<template>
<div>
  <NavBar />
  <main>
    <slot />
  </main>
</div>
</template>
