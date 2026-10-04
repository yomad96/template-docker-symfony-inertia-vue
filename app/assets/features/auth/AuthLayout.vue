<script setup lang="ts">
interface Props {
  visualImage: string
  visualImageAlt: string
  headerPrompt?: string
  headerActionLabel?: string
  headerActionHref?: string
}

defineProps<Props>()
</script>

<template>
  <main class="auth-layout">
    <section class="auth-layout__shell ui-grid ui-w-full" aria-label="Authentification">
      <aside class="auth-layout__visual">
        <img class="ui-block ui-w-full ui-h-full" :src="visualImage" :alt="visualImageAlt" />
        <div class="auth-layout__visual-veil"></div>
        <div class="auth-layout__visual-copy">
          <h1 class="cards-type-display ui-m-0">Collectionne<br />les légendes.</h1>
          <p class="cards-type-body cards-text-inverse ui-m-0 ui-mt-md">Joueurs, équipes, jeux et plus encore.<br />Une nouvelle façon de vivre l’e-sport.</p>
        </div>
      </aside>

      <section class="auth-layout__panel ui-flex ui-flex-col ui-px-2xl ui-pt-xl ui-pb-xl">
        <header class="auth-layout__header ui-flex ui-items-start ui-justify-end">
          <p v-if="headerPrompt" class="cards-type-caption cards-text-muted ui-m-0">
            {{ headerPrompt }}
            <a v-if="headerActionLabel && headerActionHref" class="cards-link" :href="headerActionHref">{{ headerActionLabel }}</a>
          </p>
        </header>

        <div class="auth-layout__form-wrap ui-mx-auto ui-my-auto">
          <slot />
        </div>
      </section>
    </section>
  </main>
</template>

<style scoped>
:global(html:has(.auth-layout)), :global(body:has(.auth-layout)) {
  height: 100%;
  overflow: hidden;
}

.auth-layout {
  height: 100dvh;
  min-height: 100svh;
  overflow: hidden;
  background: var(--cards-surface);
}

.auth-layout__shell {
  grid-template-columns: minmax(330px, .8fr) minmax(470px, 1.08fr);
  height: 100%;
  min-height: 0;
}

.auth-layout__visual { position: relative; min-height: 0; overflow: hidden; background: #161412; }
.auth-layout__visual img { object-fit: cover; object-position: 50% 30%; filter: saturate(.72); }
.auth-layout__visual-veil { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10, 9, 8, .02) 28%, rgba(10, 9, 8, .9) 88%); }
.auth-layout__visual-copy { position: absolute; right: 42px; bottom: 38px; left: 42px; }
.auth-layout__visual-copy p { opacity: .78; }

.auth-layout__panel { min-height: 0; }
.auth-layout__header { min-height: 44px; }
.auth-layout__form-wrap { width: min(100%, 386px); }

@media (max-width: 760px) {
  .auth-layout { height: auto; min-height: 100svh; overflow: visible; }
  .auth-layout__shell { display: block; height: auto; min-height: 100svh; }
  .auth-layout__visual { display: none; }
  .auth-layout__panel { min-height: 100svh; padding: var(--ui-space-lg) var(--ui-space-lg) var(--ui-space-xl); }
  .auth-layout__form-wrap { margin-inline: 0; }
}

@media (max-width: 380px) {
  .auth-layout__panel { padding-inline: var(--ui-space-md); }
}
</style>
