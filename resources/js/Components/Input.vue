<script setup>
import { onMounted, ref } from 'vue';

defineProps({
  modelValue: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: 'text',
  },
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        :type="type"
        class="border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md bg-white dark:bg-neutral-700 drop-shadow-sm dark:drop-shadow-none"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
