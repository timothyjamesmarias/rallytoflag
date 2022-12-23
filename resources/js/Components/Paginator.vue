<script setup>
import SecondaryButton from './SecondaryButton.vue';
const props = defineProps({
  links: Array,
});
</script>
<template>
<div class="py-2 text-lg">
<template v-for="link in links">
<Link v-if="link.url" 
:href="link.url" 
class="pr-4 rounded-md font-medium hover:text-violet-900 dark:hover:text-violet-500"
v-html="link.label"
:class="{'underline underline-offset-2': link.active}"
/>
<span v-else class="pr-4 rounded-md font-medium text-gray-400 dark:text-gray-600" v-html="link.label" />
</template>
</div>
</template>
