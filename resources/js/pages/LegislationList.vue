<script setup lang="ts">
import { ref, onMounted } from 'vue';
import MainLayout from '@/layouts/MainLayout.vue';
import Table from '../components/Table.vue';

type Sponsor = {
  id: number;
  first_name: string;
  last_name: string;
  hometown?: string; // optional if not always present
};

type Legislation = {
  title: string;
  text: string;
  sponsors: Sponsor[]; // Assuming sponsors are represented as an array of Sponsor objects
};

const columns = [
  { label: 'Title', key: 'title' },
  { label: 'Text', key: 'text' },
  { label: 'Sponsors', key: 'sponsors' },
];

const legislations = ref<Legislation[]>([]);

onMounted(() => {
  fetch('/api/legislations')
    .then(res => res.json())
    .then((data: Legislation[]) => {
      legislations.value = data;
    })
    .catch(error => {
      console.error('Failed to fetch legislations:', error);
    });
});

</script>

<template>
  <MainLayout>
    <h2 class="text-xl font-bold mb-4">All Legislations</h2>
    <Table :columns="columns" :rows="legislations">
      <template #sponsors="{ row }">
        <span v-for="(sponsor, idx) in row.sponsors" :key="sponsor.id">
          {{ sponsor.first_name }} {{ sponsor.last_name }}<span v-if="Number(idx) < row.sponsors.length - 1">, </span>
        </span>
      </template>
    </Table>
  </MainLayout>
</template>
