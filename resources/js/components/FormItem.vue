<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
  label: string;
  modelValue: string | number | boolean | Array<any>;
  type?: string; // 'text', 'textarea', 'checkbox', etc.
  required?: boolean;
  options?: Array<{ label: string; value: any }>; // for checkbox group
}>();

const emit = defineEmits(['update:modelValue']);

const isTextarea = computed(() => props.type === 'textarea');
const isCheckboxGroup = computed(() => props.type === 'checkbox-group' && props.options);
</script>

<template>
  <div class="mb-4">
    <label class="block mb-1">{{ label }}</label>

    <template v-if="isTextarea">
      <textarea
        :value="typeof modelValue === 'string' ? modelValue : ''"
        @input="e => emit('update:modelValue', (e.target as HTMLTextAreaElement)?.value)"
        class="w-full border rounded px-2 py-1"
      />
    </template>

    <template v-else-if="isCheckboxGroup">
      <div class="flex flex-col gap-1">
        <label
          v-for="opt in options"
          :key="opt.value"
          class="inline-flex items-center"
        >
          <input
            type="checkbox"
            :value="opt.value"
            :checked="Array.isArray(modelValue) && modelValue.includes(opt.value)"
            @change="e => {
              const checked = (e.target as HTMLInputElement)?.checked;
              let newValue = Array.isArray(modelValue) ? [...modelValue] : [];
              if (checked) {
                newValue.push(opt.value);
              } else {
                newValue = newValue.filter((v: any) => v !== opt.value);
              }
              emit('update:modelValue', newValue);
            }"
            class="mr-2"
          />
          {{ opt.label }}
        </label>
      </div>
    </template>

    <template v-else>
      <input
        :type="type || 'text'"
        :value="modelValue"
        @input="e => emit('update:modelValue', (e.target as HTMLInputElement)?.value)"
        class="w-full border rounded px-2 py-1"
      />
    </template>
  </div>
</template>