<script setup lang="ts">
import AuthLayout from '@/features/auth/AuthLayout.vue'
import LoginForm from '@/features/auth/LoginForm.vue'
import loginCollectibles from '@/images/login-collectibles.png'
</script>

<template>
  <AuthLayout
    :visual-image="loginCollectibles"
    visual-image-alt="Cartes de collection e-sport"
    header-prompt="Pas encore de compte ?"
    header-action-label="S’inscrire"
    header-action-href="/register"
  >
    <LoginForm />
  </AuthLayout>
</template>
