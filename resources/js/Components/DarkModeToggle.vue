<script setup>
import { ref } from 'vue';
import { useDark, useToggle } from '@vueuse/core';
let isDark = ref(useDark());
const toggleDark = useToggle(isDark);
</script>

<template>
  <button id="dark-mode-toggle" @click="toggleDark()">
    <template v-if="isDark">
      <font-awesome-icon icon="fa-solid fa-sun" class="text-2xl dark:text-amber-500 hover:dark:text-amber-400"/>
    </template>
    <template v-else>
      <font-awesome-icon icon="fa-solid fa-moon" class="text-2xl text-sky-700 hover:text-sky-600"/>
    </template>
  </button>
</template>
