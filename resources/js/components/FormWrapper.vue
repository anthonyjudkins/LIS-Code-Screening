<script setup lang="ts">
defineProps<{
  title: string;
  onSubmit: () => void;
  error?: string;
}>();
</script>

<template>
  <h2 class="text-xl font-bold mb-4">{{ title }}</h2>
  <form @submit.prevent="onSubmit">
    <slot />
    <div v-if="error" class="mb-2 text-red-600">{{ error }}</div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded cursor-pointer">Submit</button>
  </form>
</template>