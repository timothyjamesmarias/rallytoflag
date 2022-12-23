<script setup>
defineProps({
  href: {
    type: String,
    required: true,
  },
})
</script>
<template>
<Link :href="href" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
  <slot />
</Link>
</template>
