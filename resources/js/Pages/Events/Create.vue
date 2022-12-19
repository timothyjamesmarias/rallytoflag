<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import Card from '@/Components/Card.vue';

const form = useForm({
    name: '',
    description: '',
    start_date: '',
    end_date: '',
    start_time: '',
    end_time: '',
    location: '',
    image: '',
});

const submit = () => {

}

</script>
<template>

<Card>
  <form @submit.prevent="submit" >
    <InputLabel for="title" value="Event Title" />
    <TextInput
      id="title"
      type="text"
      class="mt-1 block w-full"
      v-model="form.title"
      required
      autofocus
      autocomplete="title"
    />

    <InputLabel for="location" value="Address" />
    <TextInput
      id="location"
      type="text"
      class="mt-1 block w-full"
      v-model="form.location"
      required
      autocomplete="location"
    />

    <InputLabel for="description" value="Description" />
    <TextAreaInput
      id="description"
      class="mt-1 block w-full"
      v-model="form.description"
      required
      autocomplete="description"
    />


  </form>
</Card>
</template>
