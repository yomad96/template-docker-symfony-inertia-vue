<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import { Input, PasswordInput } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import type { RegisterFormInput } from '@/models/auth'

const form = useForm<RegisterFormInput>({
  email: '',
  password: '',
  passwordConfirmation: '',
})

const submit = () => {
  form.post('/register')
}
</script>

<template>
  <div>
    <div class="ui-mb-xl">
      <h2 class="cards-type-heading ui-m-0">Créer un compte</h2>
      <p class="cards-type-body cards-text-muted ui-m-0 ui-mt-xs">Commencez votre collection.</p>
    </div>

    <form class="ui-grid ui-gap-md" @submit.prevent="submit">
      <div class="ui-grid ui-gap-xs">
        <Label for="email" size="sm">Email</Label>
        <Input id="email" v-model="form.email" size="lg" type="email" autocomplete="email" placeholder="votre@email.com" />
      </div>

      <div class="ui-grid ui-gap-xs">
        <Label for="password" size="sm">Mot de passe</Label>
        <PasswordInput id="password" v-model="form.password" size="lg" autocomplete="new-password" placeholder="Choisissez un mot de passe" />
      </div>

      <div class="ui-grid ui-gap-xs">
        <Label for="password-confirmation" size="sm">Confirmer le mot de passe</Label>
        <PasswordInput id="password-confirmation" v-model="form.passwordConfirmation" size="lg" autocomplete="new-password" placeholder="Confirmez votre mot de passe" />
      </div>

      <Button class="ui-w-full ui-mt-xs" variant="primary" size="lg" type="submit" :disabled="form.processing">Créer mon compte</Button>
    </form>

    <p class="cards-type-caption cards-text-muted ui-m-0 ui-mt-xl ui-text-center">Déjà un compte ? <a class="cards-link" href="/login">Se connecter</a></p>
  </div>
</template>
