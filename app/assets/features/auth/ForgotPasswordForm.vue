<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import type { ForgotPasswordFormInput } from '@/models/auth'

const form = useForm<ForgotPasswordFormInput>({
  email: '',
})

const submit = () => {
  form.post('/forgot-password')
}
</script>

<template>
  <div>
    <div class="ui-mb-xl">
      <h2 class="cards-type-heading ui-m-0">Mot de passe oublié ?</h2>
      <p class="cards-type-body cards-text-muted ui-m-0 ui-mt-xs">Saisissez votre email pour recevoir un lien de réinitialisation.</p>
    </div>

    <form class="ui-grid ui-gap-md" @submit.prevent="submit">
      <div class="ui-grid ui-gap-xs">
        <Label for="email" size="sm">Email</Label>
        <Input id="email" v-model="form.email" size="lg" type="email" autocomplete="email" placeholder="votre@email.com" />
      </div>

      <Button class="ui-w-full ui-mt-xs" variant="primary" size="lg" type="submit" :disabled="form.processing">Envoyer le lien</Button>
    </form>

    <p class="cards-type-caption cards-text-muted ui-m-0 ui-mt-xl ui-text-center"><a class="cards-link" href="/login">Retour à la connexion</a></p>
  </div>
</template>
