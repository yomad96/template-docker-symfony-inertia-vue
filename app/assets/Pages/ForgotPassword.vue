<script setup lang="ts">
import AuthLayout from '@/features/auth/AuthLayout.vue'
import ForgotPasswordForm from '@/features/auth/ForgotPasswordForm.vue'
import loginCollectibles from '@/images/login-collectibles.png'
</script>

<template>
  <AuthLayout
    :visual-image="loginCollectibles"
    visual-image-alt="Cartes de collection e-sport"
    header-prompt="Vous vous souvenez de votre mot de passe ?"
    header-action-label="Se connecter"
    header-action-href="/login"
  >
    <ForgotPasswordForm />
  </AuthLayout>
</template>
