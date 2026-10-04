<script setup lang="ts">
import AuthLayout from '@/features/auth/AuthLayout.vue'
import RegisterForm from '@/features/auth/RegisterForm.vue'
import loginCollectibles from '@/images/login-collectibles.png'
</script>

<template>
  <AuthLayout
    :visual-image="loginCollectibles"
    visual-image-alt="Cartes de collection e-sport"
    header-prompt="Déjà un compte ?"
    header-action-label="Se connecter"
    header-action-href="/login"
  >
    <RegisterForm />
  </AuthLayout>
</template>
