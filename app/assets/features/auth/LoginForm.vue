<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { Button } from '@/components/ui/button'
import { Checkbox } from '@/components/ui/checkbox'
import { Input, PasswordInput } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import type { LoginFormInput } from '@/models/auth'

const form = useForm<LoginFormInput>({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post('/login')
}
</script>

<template>
  <div>
    <div class="ui-mb-xl">
      <h2 class="cards-type-heading ui-m-0">Connexion</h2>
      <p class="cards-type-body cards-text-muted ui-m-0 ui-mt-xs">Retrouvez votre collection.</p>
    </div>

    <form class="ui-grid ui-gap-md" @submit.prevent="submit">
      <div class="ui-grid ui-gap-xs">
        <Label for="email" size="sm">Email</Label>
        <Input id="email" v-model="form.email" size="lg" type="email" autocomplete="email" placeholder="votre@email.com" />
      </div>

      <div class="ui-grid ui-gap-xs">
        <Label for="password" size="sm">Mot de passe</Label>
        <PasswordInput id="password" v-model="form.password" size="lg" autocomplete="current-password" placeholder="Votre mot de passe" />
      </div>

      <div class="ui-flex ui-items-center ui-justify-between">
        <div class="ui-flex ui-items-center ui-gap-xs">
          <Checkbox id="remember" v-model="form.remember" />
          <Label for="remember" size="sm">Se souvenir de moi</Label>
        </div>
        <a class="cards-link-subtle cards-type-caption" href="/forgot-password">Mot de passe oublié ?</a>
      </div>

      <Button class="ui-w-full ui-mt-xs" variant="primary" size="lg" type="submit" :disabled="form.processing">Se connecter</Button>
    </form>

    <div class="auth-login-form__divider cards-text-muted ui-flex ui-items-center ui-gap-sm ui-my-lg" aria-hidden="true"><span>ou</span></div>

    <p class="cards-type-caption cards-text-muted ui-m-0 ui-text-center">Pas encore de compte ? <a class="cards-link" href="/register">Créer un compte</a></p>
  </div>
</template>

<style scoped>
.auth-login-form__divider::before,
.auth-login-form__divider::after {
  flex: 1;
  height: 1px;
  content: '';
  background: var(--cards-rule);
}
</style>
