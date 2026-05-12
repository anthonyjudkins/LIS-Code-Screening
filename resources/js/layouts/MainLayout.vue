<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Legislative Information System" />
  <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <slot></slot>
    <nav class="mt-8 flex justify-center">
      <a href="/" class="text-blue-600 underline px-4 py-2 rounded hover:bg-blue-50">Home</a>
    </nav>
  </div>
</template>