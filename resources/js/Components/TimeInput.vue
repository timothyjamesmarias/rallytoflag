<script setup>
import { ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);
</script>

<template>
<input 
  type="time" 
  class="border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none"
  :value="modelValue"
  @input="$emit('update:modelValue', $event.target.value)"
  ref="input"
/>
</template>
