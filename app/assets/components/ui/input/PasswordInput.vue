<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { EyeIcon, EyeOffIcon } from '@lucide/vue'
import { useVModel } from '@vueuse/core'
import { ref } from 'vue'
import { cn } from '@/lib/utils'
import Input from './Input.vue'

defineOptions({ inheritAttrs: false })

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

const passwordVisible = ref(false)
</script>

<template>
  <div :class="cn('relative', props.class)">
    <Input
      v-bind="$attrs"
      v-model="modelValue"
      :size="props.size"
      :corners="props.corners"
      class="pr-10"
      :type="passwordVisible ? 'text' : 'password'"
    />
    <button
      class="absolute top-1/2 right-2 grid size-6 -translate-y-1/2 place-items-center rounded-[0.25rem] text-muted-foreground transition-colors hover:bg-secondary focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-ring"
      type="button"
      :aria-label="passwordVisible ? 'Masquer le mot de passe' : 'Afficher le mot de passe'"
      @click="passwordVisible = !passwordVisible"
    >
      <EyeOffIcon v-if="passwordVisible" :size="16" />
      <EyeIcon v-else :size="16" />
    </button>
  </div>
</template>
