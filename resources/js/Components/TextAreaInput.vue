<script setup>
import { ref } from 'vue';
defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

</script>
<template>
<textarea :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input"
 class="border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md shadow-sm
 bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none">
</textarea>
</template>
