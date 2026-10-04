<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cva } from 'class-variance-authority'
import { useVModel } from '@vueuse/core'
import { cn } from '@/lib/utils'

const textareaVariants = cva(
  'border-input bg-card text-foreground placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-2 focus-visible:ring-ring/20 aria-invalid:border-destructive aria-invalid:ring-2 aria-invalid:ring-destructive/20 disabled:bg-muted disabled:cursor-not-allowed disabled:opacity-50 flex min-h-16 w-full resize-y border px-3 py-2 text-sm transition-colors outline-none',
  {
    variants: { corners: { soft: 'rounded-[var(--radius)]', square: 'rounded-none' } },
    defaultVariants: { corners: 'soft' },
  },
)

const props = defineProps<{
  class?: HTMLAttributes['class']
  defaultValue?: string | number
  modelValue?: string | number
  corners?: 'soft' | 'square'
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
  <textarea
    v-model="modelValue"
    data-slot="textarea"
    :class="cn(textareaVariants({ corners: props.corners }), props.class)"
  />
</template>
