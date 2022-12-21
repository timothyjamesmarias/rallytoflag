<script setup>
import Inertia from '@inertiajs/inertia'
import Form from './Partials/Form.vue';

const props = defineProps({
  event: Object,
});

</script>
<template>

<Form :state="'edit'" :event="event"/>

</template>
