<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <MainLayout>
        <h1 class="text-2xl font-bold mb-4">Welcome to the Legislative Information System</h1>
        <p class="mb-4">Use the navigation links to manage legislators and legislations.</p>

        <div class="flex gap-4">
            <a href="/legislators" class="bg-blue-600 text-white px-4 py-2 rounded">View Legislators</a>
            <a href="/legislators/create" class="bg-green-600 text-white px-4 py-2 rounded">Add Legislator</a>
            <a href="/legislations" class="bg-blue-600 text-white px-4 py-2 rounded">View Legislations</a>
            <a href="/legislations/create" class="bg-green-600 text-white px-4 py-2 rounded">Add Legislation</a>
        </div>
    </MainLayout>
</template>
