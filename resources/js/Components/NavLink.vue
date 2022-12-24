<script setup>
const props = defineProps({
  href: {
    type: String,
    required: true,
  },
});
</script>

<template>
    <Link :href="href" 
    class="hover:text-violet-300">
        <slot />
    </Link>
</template>
