<script setup>
import NavBar from '@/Components/NavBar.vue';
import PageTitle from '@/Components/PageTitle.vue';

</script>

<template>
<div class="bg-stone-100 dark:bg-stone-900">
  <NavBar />
  <main class="min-h-screen">
    <PageTitle>
      <slot name="title"></slot>
    </PageTitle>
    <slot />
  </main>
</div>
</template>
