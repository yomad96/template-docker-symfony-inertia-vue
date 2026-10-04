<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cva } from 'class-variance-authority'
import { useVModel } from '@vueuse/core'
import { cn } from '@/lib/utils'

const inputVariants = cva(
  'border-input bg-card text-foreground placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-2 focus-visible:ring-ring/20 aria-invalid:border-destructive aria-invalid:ring-2 aria-invalid:ring-destructive/20 disabled:bg-muted disabled:cursor-not-allowed disabled:opacity-50 w-full min-w-0 border px-3 text-sm transition-colors outline-none file:inline-flex file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground',
  {
    variants: {
      size: { sm: 'h-7', default: 'h-8', lg: 'h-10' },
      corners: { soft: 'rounded-[var(--radius)]', square: 'rounded-none' },
    },
    defaultVariants: { size: 'default', corners: 'soft' },
  },
)

const props = defineProps<{
  defaultValue?: string | number
  modelValue?: string | number
  size?: 'sm' | 'default' | 'lg'
  corners?: 'soft' | 'square'
  class?: HTMLAttributes['class']
}>()

const emits = defineEmits<{
  (e: 'update:modelValue', payload: string | number): void
}>()

const modelValue = useVModel(props, 'modelValue', emits, {
  passive: true,
  defaultValue: props.defaultValue,
})
</script>

<template>
  <input
    v-model="modelValue"
    data-slot="input"
    :class="cn(
      inputVariants({ size: props.size, corners: props.corners }),
      props.class,
    )"
  >
</template>
