<script setup lang="ts">

defineProps<{
  columns: { label: string; key: string }[];
  rows: any[];
}>();

</script>

<template>
  <table class="w-full border">
    <thead>
      <tr>
        <th v-for="col in columns" :key="col.key" class="border px-2 py-1">
          {{ col.label }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(row, idx) in rows" :key="idx">
        <td v-for="col in columns" :key="col.key" class="border px-2 py-1">
          <slot :name="col.key" :row="row">
            {{ row[col.key] }}
          </slot>
        </td>
      </tr>
    </tbody>
  </table>
</template>