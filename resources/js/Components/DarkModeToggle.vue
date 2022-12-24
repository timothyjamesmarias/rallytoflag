<script setup>
import { useDark, useToggle } from '@vueuse/core';
const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
  <button id="dark-mode-toggle" @click="toggleDark()">
    <font-awesome-icon icon="fa-solid fa-moon"  class="text-2xl text-sky-700 hover:text-sky-600 dark:text-amber-500 hover:dark:text-amber-400"/>
  </button>
</template>
