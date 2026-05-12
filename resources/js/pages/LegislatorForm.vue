<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';
import FormWrapper from '../components/FormWrapper.vue';
import FormItem from '../components/FormItem.vue';

const firstName = ref('');
const lastName = ref('');
const hometown = ref('');
const error = ref('');

function submit() {
  if (!firstName.value || !lastName.value || !hometown.value) {
    error.value = 'All fields are required.';
    return;
  }
  
  router.post('/api/legislators', {
    first_name: firstName.value,
    last_name: lastName.value,
    hometown: hometown.value,
  }, {
    onSuccess: () => {
      router.visit('/legislators');
    },
    onError: (errors) => {
      error.value = errors.first_name || errors.last_name || errors.hometown || 'Submission failed.';
    }
  });           
}
</script>

<template>
  <MainLayout>
    <FormWrapper title="Add Legislator" :onSubmit="submit" :error="error">
      <FormItem label="First Name" v-model="firstName" required />
      <FormItem label="Last Name" v-model="lastName" required />
      <FormItem label="Hometown" v-model="hometown" required />
    </FormWrapper>
  </MainLayout>
</template>
