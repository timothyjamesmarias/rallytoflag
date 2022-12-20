<script setup>
import Inertia from '@inertiajs/inertia'
import Form from './Partials/Form.vue';

const submit = () => {
  Inertia.patch('/events{event}', form);
};

</script>
<template>

<Form @submit="submit"/>

</template>
