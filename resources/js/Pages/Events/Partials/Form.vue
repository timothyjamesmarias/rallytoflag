<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import TimeInput from '@/Components/TimeInput.vue';
import Card from '@/Components/Card.vue';
import DateInput from '@/Components/DateInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  event: Object,
  errors: Object,
  state: String,
});

const form = useForm({
    title: '',
    description: '',
    start_date: '',
    end_date: '',
    start_time: '',
    url: '',
    location: '',
    images: null,
});

let submit;

if (props.state === 'create') {
  submit = () => {
    form.post(route('event.store'))
  }
}
else if (props.state === 'edit') {
let event_param = props.event.id;
  submit = () => {
    form.patch(route('event.update', props.event))
  }

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
    <InputError class="mt-2" :message="form.errors.title" />

    <InputLabel for="location" value="Address" />
    <TextInput
      id="location"
      type="text"
      class="mt-1 block w-full"
      v-model="form.location"
      required
      autocomplete="location"
    />
    <InputError class="mt-2" :message="form.errors.location" />

    <InputLabel for="url" value="Event Website (optional)" />
    <TextInput
      id="url"
      type="text"
      class="mt-1 block w-full"
      v-model="form.url"
      autocomplete="url"
    />
    <InputError class="mt-2" :message="form.errors.url" />

    <InputLabel for="description" value="Description" />
    <TextAreaInput
      id="description"
      class="mt-1 block w-full"
      v-model="form.description"
      required
      autocomplete="description"
    />
    <InputError class="mt-2" :message="form.errors.description" />

  <div class="flex mb-3">
    <div class="w-1/2 pr-2">
      <InputLabel for="start_date" value="Start Date" />
      <DateInput id="start_date" autocomplete="start_date" class="mt-1 block w-full" v-model="form.start_date" required />
      <InputError class="mt-2" :message="form.errors.start_date" />
    </div>
    <div class="w-1/2 pl-2">
      <InputLabel for="end_date" value="End Date (optional)" />
      <DateInput id="end_date" class="mt-1 block w-full" v-model="form.end_date" />
      <InputError class="mt-2" :message="form.errors.end_date" />
    </div>
  </div>

  <InputLabel for="start_time" value="Start Time (optional)" />
  <TimeInput id="start_time" class="mt-1 block w-full" v-model="form.start_time" />

  <InputLabel for="images" value="Images (max 6)" />
  <input type="file" name="images" class="mt-1" id="images" multiple @input="form.images = $event.target.files" />

  <PrimaryButton class="mt-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
    {{ props.state === 'create' ? 'Add Event' : 'Update Event' }}
  </PrimaryButton>
  </form>
</Card>
</template>
