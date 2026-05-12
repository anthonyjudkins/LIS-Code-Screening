<script setup lang="ts">
import { ref, onMounted } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';
import Table from '../components/Table.vue';

type Legislator = {
  id: number;
  first_name: string;
  last_name: string;
  hometown?: string; // optional if not always present
};

const columns = [
  { label: 'First Name', key: 'first_name' },
  { label: 'Last Name', key: 'last_name' },
  { label: 'Hometown', key: 'hometown' },
];

const legislators = ref<Legislator[]>([]);

onMounted(() => {
  fetch('/api/legislators')
    .then(res => res.json())
    .then((data: Legislator[]) => {
      legislators.value = data;
    })
    .catch(error => {
      console.error('Failed to fetch legislators:', error);
    });
});

</script>

<template>
  <MainLayout>
    <h2 class="text-xl font-bold mb-4">All Legislators</h2>
    <Table :columns="columns" :rows="legislators" />
  </MainLayout>
</template>
