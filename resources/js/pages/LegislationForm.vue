
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';
import FormWrapper from '../components/FormWrapper.vue';
import FormItem from '../components/FormItem.vue';

type Legislator = {
  id: number;
  first_name: string;
  last_name: string;
  hometown?: string;
};

const title = ref('');
const text = ref('');
const sponsors = ref<number[]>([]);
const error = ref('');
const allLegislators = ref<Legislator[]>([]);

onMounted(() => {
  fetch('/api/legislators')
    .then(res => res.json())
    .then((data: Legislator[]) => {
      allLegislators.value = data;
    })
    .catch(error => {
      console.error('Failed to fetch legislators:', error);
    });
});

function submit() {
  if (!title.value || !text.value) {
    error.value = 'Title and Text are required.';
    return;
  }
  router.post('/api/legislations', {
    title: title.value,
    text: text.value,
    sponsors: sponsors.value,
  }, {
    onSuccess: () => {
      router.visit('/legislations');
    },
    onError: (errors) => {
      error.value = errors.title || errors.text || 'Submission failed.';
    }
  });
}
</script>

<template>
  <MainLayout>
    <FormWrapper title="Add Legislation" :onSubmit="submit" :error="error">
      <FormItem 
        label="Title" 
        v-model="title" 
        required 
      />
      <FormItem 
        label="Text" 
        v-model="text" 
        required 
        type="textarea" 
      />
      <FormItem 
        label="Sponsors"
        :options="allLegislators.map(l => ({ label: l.first_name + ' ' + l.last_name, value: l.id }))"
        v-model="sponsors"
        required
        type="checkbox-group"
      />
    </FormWrapper>
  </MainLayout>
</template>
