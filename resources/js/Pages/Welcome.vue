<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Input from '@/Components/Input.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Card from '@/Components/Card.vue';
import { ref } from 'vue';

const form = useForm({
  query: '',
});

const search = () => {
}
</script>

<template>
  <Head title="Welcome" />
    
<Card class="min-h-screen">
  <span class="inline-flex items-center text-center">
    <p class="text-lg pr-4">I am looking for events near</p>
    <form @submit.prevent="search">
      <Input type="text" v-model="query" />
      <PrimaryButton @submit.prevent="search" class="ml-4">Search</PrimaryButton>
    </form>
  </span>
</Card>
</template>
