<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Input from '@/Components/Input.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import Card from '@/Components/Card.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { onMounted } from 'vue';

const mapboxToken = import.meta.env.VITE_MAPBOX;

const props = defineProps({
  event: {
    type: Object,
    required: false,
  },
  errors: Object,
  state: {
    type: String,
    required: true,
  },
});

let form, submit;

if (props.state === 'create') {
  form = useForm({
      title: '',
      description: '',
      start_date: '',
      end_date: '',
      start_time: '',
      url: '',
      location: '',
      images: null,
  });

  submit = () => {
    form.post(route('event.store'))
  }
}
else if (props.state === 'edit') {
  form = useForm({
      title: props.event.title,
      description: props.event.description,
      start_date: props.event.start_date,
      end_date: props.event.end_date,
      start_time: props.event.start_time,
      url: props.event.url,
      location: props.event.location,
      images: null,
  });

  submit = () => {
    Inertia.post(route('event.update', props.event), {
      _method: 'PATCH',
      ...form,
    });
  }
}

const geocoder = new MapboxGeocoder({
  accessToken: mapboxToken,
  types: 'country,region,place,postcode,locality,neighborhood',
});

onMounted(() => {
  geocoder.addTo('#geocoder');
});

const updateLocation = (e) => {
  form.location = e.target.value;
};

</script>
<template>
<Card>
  <h1 v-if="state === 'create'" class="font-bold text-xl">Add a new event</h1>
  <h1 v-else class="font-bold text-xl">Edit event</h1>
  <form @submit.prevent="submit" >
    <InputLabel for="title" class="mt-3" value="Title" />
    <Input
      type="text"
      id="title"
      class="block w-full"
      v-model="form.title"
      required
      autofocus
      autocomplete="title"
    />
    <InputError class="mt-3" :message="form.errors.title" />

    <InputLabel for="location" class="mt-3" value="Address" />
    <div id="geocoder" @change="updateLocation($event)"></div>
    <InputError class="mt-3" :message="form.errors.location" />

    <InputLabel for="url" class="mt-3" value="Event Website (optional)" />
    <Input
      type="url"
      id="url"
      class="block w-full"
      v-model="form.url"
      autocomplete="url"
    />
    <InputError class="mt-3" :message="form.errors.url" />

    <InputLabel for="description" class="mt-3" value="Description" />
    <TextAreaInput
      id="description"
      class="block w-full"
      v-model="form.description"
      required
      autocomplete="description"
    />
    <InputError class="mt-3" :message="form.errors.description" />

  <div class="flex">
    <div class="w-1/2 pr-2">
      <InputLabel for="start_date" class="mt-3" value="Start Date" />
      <Input type="date" id="start_date" autocomplete="start_date" class="w-full" v-model="form.start_date" required />
      <InputError class="mt-3" :message="form.errors.start_date" />
    </div>
    <div class="w-1/2 pl-2">
      <InputLabel for="end_date" class="mt-3" value="End Date (optional)" />
      <Input type="date" id="end_date" class="w-full" v-model="form.end_date" />
      <InputError class="mt-3" :message="form.errors.end_date" />
    </div>
  </div>

  <InputLabel for="start_time" class="mt-3" value="Start Time (optional)" />
  <Input type="time" id="start_time" class="w-full" v-model="form.start_time" />

  <template v-if="state === 'create'">
    <InputLabel for="images" class="mt-3" value="Images (optional, max 6)" />
  </template>
  <template v-else>
    <InputLabel for="images" class="mt-3" value="Images, (optional, max 6, upload to replace current images)" />
  </template>
  <Input type="file" id="images" class="w-full" multiple @input="form.images = $event.target.files" />
  <InputError class="mt-3" :message="form.errors.images" />

  <PrimaryButton class="float-right mt-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
    {{ props.state === 'create' ? 'Add Event' : 'Update Event' }}
  </PrimaryButton>
  </form>
</Card>
</template>
