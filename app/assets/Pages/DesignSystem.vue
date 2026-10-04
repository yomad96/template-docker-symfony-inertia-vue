<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Checkbox } from '@/components/ui/checkbox'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group'
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'
import { Switch } from '@/components/ui/switch'
import { Textarea } from '@/components/ui/textarea'

const selectedCollection = ref('league-of-legends')
const selectedRarity = ref('rare')
const isSelected = ref(true)
const notificationsEnabled = ref(true)
</script>

<template>
  <main class="design-system">
    <header class="design-system__masthead">
      <a class="brand" href="/design-system" aria-label="Cards — Design System">
        <svg class="brand__mark" viewBox="0 0 30 34" aria-hidden="true">
          <path d="M3 2h24L17.5 32h-6L3 2Zm6 6 5.5 15L21 8h-4l-2.5 8.3L12 8H9Z" fill="currentColor" />
        </svg>
        <span>CARDS</span>
      </a>

      <div class="masthead__title">
        <p class="masthead__eyebrow">Produit · interface de collection</p>
        <h1>CARDS — Design System <span>v1.0</span></h1>
        <p>Fondations, composants &amp; patterns</p>
      </div>

      <p class="masthead__description">
        Une expérience de collection dédiée à l’esport. Des cartes officielles, des joueurs légendaires,
        une communauté passionnée.
      </p>

      <p class="masthead__version"><strong>v1.0</strong><br />Septembre 2026</p>
    </header>

    <section class="design-section foundation-section" aria-labelledby="foundations-title">
      <div class="section-heading">
        <span>01.</span>
        <h2 id="foundations-title">Fondations</h2>
      </div>

      <div class="foundation-grid">
        <article class="foundation-card">
          <span class="foundation-card__glyph">◇</span>
          <h3>Éditorial</h3>
          <p>Des titres expressifs et une composition qui laisse respirer les visuels.</p>
        </article>
        <article class="foundation-card">
          <span class="foundation-card__glyph">▱</span>
          <h3>Collection</h3>
          <p>Des repères simples pour parcourir cartes, joueurs, équipes et éditions.</p>
        </article>
        <article class="foundation-card">
          <span class="foundation-card__glyph">◈</span>
          <h3>Premium</h3>
          <p>Une matière sobre, des détails précis et une attention portée aux raretés.</p>
        </article>
        <article class="foundation-card">
          <span class="foundation-card__glyph">◎</span>
          <h3>Clarté</h3>
          <p>Une interface lisible, conçue pour servir l’action et la collection.</p>
        </article>
      </div>
    </section>

    <div class="two-column-layout">
      <section class="design-section palette-section" aria-labelledby="palette-title">
        <div class="section-heading">
          <span>02.</span>
          <h2 id="palette-title">Palette principale</h2>
        </div>

        <div class="color-grid">
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--ink"></span>
            <code>#111111</code><strong>Ink</strong><small>Noir principal</small>
          </article>
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--paper"></span>
            <code>#F7F5F1</code><strong>Paper</strong><small>Blanc cassé</small>
          </article>
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--surface"></span>
            <code>#FFFFFF</code><strong>Surface</strong><small>Blanc</small>
          </article>
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--accent"></span>
            <code>#E83B4F</code><strong>Accent</strong><small>Rouge collection</small>
          </article>
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--gold"></span>
            <code>#C9A45C</code><strong>Gold</strong><small>Légendaire</small>
          </article>
          <article class="color-token">
            <span class="color-token__swatch color-token__swatch--blue"></span>
            <code>#3A67C7</code><strong>Blue</strong><small>Équipe</small>
          </article>
        </div>

        <div class="semantic-tokens" aria-label="Couleurs sémantiques">
          <p>Couleurs sémantiques</p>
          <span class="semantic-token semantic-token--success">Succès</span>
          <span class="semantic-token semantic-token--warning">Alerte</span>
          <span class="semantic-token semantic-token--error">Erreur</span>
          <span class="semantic-token semantic-token--info">Info</span>
        </div>
      </section>

      <section class="design-section type-section" aria-labelledby="type-title">
        <div class="section-heading">
          <span>03.</span>
          <h2 id="type-title">Typographie</h2>
        </div>

        <div class="type-showcase">
          <div class="type-showcase__alphabets">
            <p><strong>Playfair Display</strong><small>Titres, éditorial</small></p>
            <span class="display-alphabet">Aa</span>
            <p><strong>Inter</strong><small>Interface, données</small></p>
            <span class="body-alphabet">Aa</span>
          </div>
          <div class="type-scale">
            <p class="type-scale__display">Les légendes du jeu</p>
            <p class="type-scale__h2">Collection officielle</p>
            <p class="type-scale__h3">Cartes e-sport</p>
            <p class="type-scale__body">Découvrez les plus grands joueurs et équipes de l’esport.</p>
            <p class="type-scale__caption">12 436 cartes disponibles · édition officielle 2026</p>
          </div>
        </div>
      </section>
    </div>

    <section class="design-section metrics-section" aria-labelledby="metrics-title">
      <div class="section-heading">
        <span>04.</span>
        <h2 id="metrics-title">Espacement, rayons &amp; ombres</h2>
      </div>

      <div class="metrics-grid">
        <div class="metric-block">
          <h3>Échelle d’espacement</h3>
          <div class="spacing-scale">
            <span v-for="size in [4, 8, 12, 16, 24, 32, 48, 64]" :key="size">
              <i :style="{ width: `${size}px`, height: `${size}px` }"></i>{{ size }}
            </span>
          </div>
          <small>Base de 8 px. Les grands espaces installent la hiérarchie.</small>
        </div>
        <div class="metric-block">
          <h3>Rayons de bordure</h3>
          <div class="radius-scale">
            <span><i class="radius-scale__sm"></i><b>8 px</b><small>Composants</small></span>
            <span><i class="radius-scale__md"></i><b>12 px</b><small>Cartes</small></span>
            <span><i class="radius-scale__lg"></i><b>16 px</b><small>Modules</small></span>
          </div>
        </div>
        <div class="metric-block">
          <h3>Ombres</h3>
          <div class="shadow-scale">
            <span><i class="shadow-scale__one"></i><b>Shadow 1</b><small>Éléments subtils</small></span>
            <span><i class="shadow-scale__two"></i><b>Shadow 2</b><small>Cartes, menus</small></span>
            <span><i class="shadow-scale__three"></i><b>Shadow 3</b><small>Modales, survols</small></span>
          </div>
        </div>
      </div>
    </section>

    <section class="design-section controls-section" aria-labelledby="controls-title">
      <div class="section-heading">
        <span>05.</span>
        <h2 id="controls-title">Composants &amp; formulaires</h2>
      </div>

      <div class="controls-grid">
        <article class="control-sample control-sample--buttons">
          <div class="control-sample__title">
            <h3>Boutons</h3>
            <p>Actions principales, secondaires et sensibles.</p>
          </div>
          <div class="button-specimens">
            <div>
              <span>Primaire</span>
              <Button>Découvrir la collection <b aria-hidden="true">→</b></Button>
            </div>
            <div>
              <span>Secondaire</span>
              <Button variant="outline">Ajouter à ma collection</Button>
            </div>
            <div>
              <span>Fantôme</span>
              <Button variant="ghost">Voir le marché <b aria-hidden="true">→</b></Button>
            </div>
            <div>
              <span>Angles droits</span>
              <Button corners="square" variant="outline">Gérer mes cartes</Button>
            </div>
            <div>
              <span>Destructif</span>
              <Button variant="destructive">Supprimer</Button>
            </div>
            <div>
              <span>Désactivé</span>
              <Button disabled>Indisponible</Button>
            </div>
          </div>
        </article>

        <article class="control-sample control-sample--form">
          <div class="control-sample__title">
            <h3>Champs &amp; recherche</h3>
            <p>Les composants shadcn-vue pour les sélections et les actions.</p>
          </div>
          <form class="form-specimens" @submit.prevent>
            <div class="form-field">
              <Label for="player-name">Champ texte</Label>
              <Input id="player-name" placeholder="Nom du joueur…" />
            </div>
            <div class="form-field">
              <Label for="collection">Collection</Label>
              <Select v-model="selectedCollection">
                <SelectTrigger id="collection"><SelectValue /></SelectTrigger>
                <SelectContent>
                  <SelectItem value="league-of-legends">League of Legends</SelectItem>
                  <SelectItem value="valorant">VALORANT</SelectItem>
                  <SelectItem value="counter-strike">Counter-Strike 2</SelectItem>
                </SelectContent>
              </Select>
            </div>
            <div class="form-field form-field--wide">
              <Label for="note">Note de collection</Label>
              <Textarea id="note" placeholder="Ajoutez une note à cette carte…" />
            </div>
            <div class="choice-specimens form-field--wide">
              <div class="choice-item">
                <Checkbox id="selected-card" v-model="isSelected" />
                <Label for="selected-card">Carte sélectionnée</Label>
              </div>
              <div class="choice-item">
                <Switch id="notifications" v-model="notificationsEnabled" />
                <Label for="notifications">Alertes de collection</Label>
              </div>
              <RadioGroup v-model="selectedRarity" class="radio-choice" aria-label="Rareté de la carte">
                <div><RadioGroupItem id="rare" value="rare" /><Label for="rare">Rare</Label></div>
                <div><RadioGroupItem id="epic" value="epic" /><Label for="epic">Épique</Label></div>
                <div><RadioGroupItem id="legendary" value="legendary" /><Label for="legendary">Légendaire</Label></div>
              </RadioGroup>
            </div>
          </form>
        </article>
      </div>
    </section>

    <section class="design-section patterns-section" aria-labelledby="patterns-title">
      <div class="section-heading">
        <span>06.</span>
        <h2 id="patterns-title">Tags &amp; statuts</h2>
      </div>

      <div class="patterns-grid">
        <article>
          <h3>Rareté des cartes</h3>
          <div class="rarity-list">
            <span class="rarity rarity--common"><i></i>Commune</span>
            <span class="rarity rarity--rare"><i></i>Rare</span>
            <span class="rarity rarity--epic"><i></i>Épique</span>
            <span class="rarity rarity--legendary"><i></i>Légendaire</span>
          </div>
        </article>
        <article>
          <h3>Statuts sémantiques</h3>
          <div class="status-list">
            <span class="status status--success"><b>✓</b> Succès<small>Opération réussie</small></span>
            <span class="status status--warning"><b>!</b> Alerte<small>Attention requise</small></span>
            <span class="status status--error"><b>×</b> Erreur<small>Une erreur est survenue</small></span>
          </div>
        </article>
        <article>
          <h3>Statuts divers</h3>
          <div class="availability-list">
            <span><i class="dot dot--new"></i>Nouveau</span>
            <span><i class="dot dot--stock"></i>En stock</span>
            <span><i class="dot dot--limited"></i>Stock limité</span>
            <span class="is-muted"><i class="dot"></i>Épuisé</span>
          </div>
        </article>
      </div>
    </section>

    <footer class="design-system__footer">
      <p>CARDS — Système de conception</p>
      <p>Privilégier l’espace · hiérarchie claire · couleurs maîtrisées · univers premium</p>
    </footer>
  </main>
</template>

<style>
.design-system {
  --ds-ink: #111111;
  --ds-paper: #f7f5f1;
  --ds-surface: #ffffff;
  --ds-rule: #dedbd5;
  --ds-muted: #6b6b6b;
  --ds-accent: #e83b4f;
  --ds-gold: #c9a45c;
  --ds-blue: #3a67c7;
  --ds-green: #2e9e5b;
  --ds-yellow: #e0a105;
  --ds-red: #d64545;
  --ds-font-display: 'Playfair Display', Georgia, serif;
  min-height: 100vh;
  padding: 22px clamp(20px, 3vw, 54px) 34px;
  color: var(--ds-ink);
  background: var(--ds-paper);
  font-family: 'Inter', Arial, sans-serif;
}

.design-system *, .design-system *::before, .design-system *::after { box-sizing: border-box; }
.design-system h1, .design-system h2, .design-system h3, .design-system p { margin: 0; }
.design-system button, .design-system input, .design-system textarea { font-family: inherit; }

.design-system__masthead {
  display: grid;
  grid-template-columns: 160px minmax(360px, 1.7fr) minmax(200px, .72fr) 105px;
  gap: 18px;
  align-items: center;
  min-height: 84px;
  padding: 0 0 20px;
  border-bottom: 1px solid var(--ds-rule);
}

.brand { display: inline-flex; align-items: center; gap: 9px; width: max-content; color: var(--ds-ink); text-decoration: none; font-size: 22px; font-weight: 850; letter-spacing: -1.5px; }
.brand__mark { width: 27px; height: 31px; }
.masthead__title { padding-left: 28px; border-left: 1px solid var(--ds-rule); }
.masthead__eyebrow { margin-bottom: 3px !important; color: var(--ds-muted); font-size: 10px; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }
.masthead__title h1 { font-family: var(--ds-font-display); font-size: clamp(28px, 3.1vw, 46px); font-weight: 700; line-height: .95; letter-spacing: -2.3px; }
.masthead__title h1 span { color: var(--ds-muted); font-family: 'Inter', sans-serif; font-size: 11px; font-weight: 600; letter-spacing: 0; vertical-align: middle; }
.masthead__title > p:last-child { margin-top: 5px; color: #59606e; font-family: var(--ds-font-display); font-size: 20px; line-height: 1; }
.masthead__description { padding-left: 28px; border-left: 1px solid var(--ds-rule); color: #666b75; font-size: 12px; line-height: 1.45; }
.masthead__version { padding-left: 20px; border-left: 1px solid var(--ds-rule); color: #70737a; font-size: 11px; line-height: 1.55; }
.masthead__version strong { color: var(--ds-ink); font-weight: 700; }

.design-section { padding: 19px 0 22px; border-bottom: 1px solid var(--ds-rule); }
.section-heading { display: flex; align-items: baseline; gap: 18px; margin-bottom: 17px; }
.section-heading > span { color: #636873; font-size: 12px; font-weight: 650; }
.section-heading h2 { font-family: var(--ds-font-display); font-size: 19px; line-height: 1; letter-spacing: -.55px; }

.foundation-grid { display: grid; grid-template-columns: repeat(4, 1fr); }
.foundation-card { min-height: 160px; padding: 8px 21px; text-align: center; border-right: 1px solid var(--ds-rule); }
.foundation-card:last-child { border-right: 0; }
.foundation-card__glyph { display: block; margin-bottom: 12px; font-family: Georgia, serif; font-size: 42px; line-height: 1; }
.foundation-card h3, .metric-block h3, .patterns-grid h3 { margin-bottom: 8px; font-family: var(--ds-font-display); font-size: 17px; }
.foundation-card p { max-width: 185px; margin: auto; color: #666b75; font-size: 12px; line-height: 1.45; }

.two-column-layout { display: grid; grid-template-columns: 1.25fr 1fr; gap: 0 35px; }
.two-column-layout .design-section { min-width: 0; }
.type-section { padding-left: 35px; border-left: 1px solid var(--ds-rule); }
.color-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px 13px; }
.color-token { display: grid; grid-template-columns: 1fr; gap: 3px; min-width: 0; font-size: 11px; }
.color-token__swatch { display: block; height: 42px; margin-bottom: 1px; border: 1px solid rgba(17,17,17,.08); border-radius: 7px; }
.color-token code { color: #5e626b; font-family: 'Inter', sans-serif; font-size: 10px; }
.color-token strong { font-size: 11px; }
.color-token small { color: #70737a; font-size: 10px; }
.color-token__swatch--ink { background: #111; }.color-token__swatch--paper { background: #f7f5f1; }.color-token__swatch--surface { background: #fff; }.color-token__swatch--accent { background: #e83b4f; }.color-token__swatch--gold { background: #c9a45c; }.color-token__swatch--blue { background: #3a67c7; }
.semantic-tokens { display: flex; flex-wrap: wrap; align-items: center; gap: 7px; margin-top: 20px; padding-top: 13px; border-top: 1px solid var(--ds-rule); }
.semantic-tokens p { width: 100%; margin-bottom: 2px; font-family: var(--ds-font-display); font-size: 14px; }
.semantic-token { padding: 5px 8px; border-radius: 5px; font-size: 10px; font-weight: 650; }.semantic-token--success { color:#18733c; background:#dff5e6; }.semantic-token--warning { color:#895d00; background:#fff0ca; }.semantic-token--error { color:#9e2525; background:#fde0e0; }.semantic-token--info { color:#285aaf; background:#dce8ff; }

.type-showcase { display: grid; grid-template-columns: 125px 1fr; gap: 20px; }
.type-showcase__alphabets { border-right: 1px solid var(--ds-rule); }
.type-showcase__alphabets p { display: grid; gap: 2px; font-size: 11px; }.type-showcase__alphabets small { color: var(--ds-muted); font-size: 10px; }
.display-alphabet, .body-alphabet { display: block; margin: 3px 0 14px; font-size: 62px; line-height: .85; letter-spacing: -7px; }.display-alphabet { font-family: var(--ds-font-display); }.body-alphabet { font-weight: 400; }
.type-scale { display: grid; align-content: start; gap: 8px; }.type-scale p { line-height: 1; }.type-scale__display { font-family: var(--ds-font-display); font-size: 29px; font-weight: 700; letter-spacing: -1.5px; }.type-scale__h2 { font-family: var(--ds-font-display); font-size: 23px; font-weight: 700; letter-spacing: -1px; }.type-scale__h3 { font-family: var(--ds-font-display); font-size: 17px; font-weight: 700; }.type-scale__body { max-width: 230px; color: #59606e; font-size: 12px; line-height: 1.3 !important; }.type-scale__caption { margin-top: 3px !important; color: #59606e; font-size: 10px; }

.metrics-grid { display: grid; grid-template-columns: 1.15fr 1fr 1fr; gap: 35px; }.metric-block + .metric-block { padding-left: 35px; border-left: 1px solid var(--ds-rule); }.metric-block h3 { font-size: 15px; }.metric-block > small { color: var(--ds-muted); font-size: 10px; line-height: 1.4; }
.spacing-scale { display: flex; align-items: end; gap: 13px; min-height: 80px; margin: 9px 0 9px; }.spacing-scale span { display: grid; justify-items: center; gap: 6px; color: #555a64; font-size: 10px; }.spacing-scale i { display: block; max-width: 40px; max-height: 40px; background: #f3c7ce; border-radius: 4px 4px 0 0; }
.radius-scale, .shadow-scale { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 10px; }.radius-scale span, .shadow-scale span { display: grid; gap: 6px; }.radius-scale i, .shadow-scale i { display:block; height: 43px; background: #fff; border: 1px solid #e7e4df; }.radius-scale b, .shadow-scale b { font-size: 10px; }.radius-scale small, .shadow-scale small { color: var(--ds-muted); font-size: 9px; }.radius-scale__sm { border-radius: 8px; }.radius-scale__md { border-radius: 12px; }.radius-scale__lg { border-radius: 16px; }.shadow-scale__one { box-shadow: 0 2px 4px rgba(17,17,17,.05); }.shadow-scale__two { box-shadow: 0 6px 12px rgba(17,17,17,.08); }.shadow-scale__three { box-shadow: 0 10px 22px rgba(17,17,17,.12); }

.controls-grid { display: grid; grid-template-columns: .95fr 1.3fr; gap: 35px; }.control-sample { min-width: 0; }.control-sample--form { padding-left: 35px; border-left: 1px solid var(--ds-rule); }.control-sample__title { margin-bottom: 14px; }.control-sample__title h3 { margin-bottom: 3px; font-family: var(--ds-font-display); font-size: 17px; }.control-sample__title p { color: var(--ds-muted); font-size: 11px; }
.button-specimens { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }.button-specimens > div { display: grid; gap: 5px; }.button-specimens > div:last-child { grid-column: span 2; max-width: calc(50% - 5px); }.button-specimens > div > span { color: #656a73; font-size: 10px; }.button-specimens button { justify-content: space-between; width: 100%; }.button-specimens button b { font-size: 15px; font-weight: 400; }
.form-specimens { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 13px 15px; }.form-field { display: grid; gap: 5px; }.form-field label, .choice-item label, .radio-choice label { color: #3e424a; font-size: 11px; font-weight: 500; }.form-field--wide { grid-column: span 2; }.choice-specimens { display: flex; flex-wrap: wrap; align-items: center; gap: 11px 18px; }.choice-item, .radio-choice > div { display: flex; align-items: center; gap: 7px; }.radio-choice { display: flex; flex-wrap: wrap; gap: 10px; }

.patterns-grid { display: grid; grid-template-columns: .8fr 1.5fr 1.1fr; gap: 35px; }.patterns-grid > article + article { padding-left: 35px; border-left: 1px solid var(--ds-rule); }.patterns-grid h3 { font-size: 15px; }.rarity-list, .availability-list { display: flex; flex-wrap: wrap; gap: 8px; }.rarity { display: inline-flex; align-items: center; gap: 6px; padding: 6px 9px; border-radius: 5px; font-size: 11px; font-weight: 600; }.rarity i { width: 10px; height: 10px; transform: rotate(45deg); border: 1px solid currentColor; }.rarity--common { color: #616875; background: #eceef1; }.rarity--rare { color: #2864c7; background: #e2ecff; }.rarity--epic { color: #6931a7; background: #eee0ff; }.rarity--legendary { color: #8d6414; background: #fff1d3; }
.status-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; }.status { display: grid; grid-template-columns: auto 1fr; align-items: center; gap: 4px 6px; padding: 9px; border-radius: 5px; font-size: 11px; font-weight: 700; }.status b { display: grid; place-items: center; width: 15px; height: 15px; border-radius: 99px; color: white; font-size: 10px; }.status small { grid-column: span 2; font-size: 9px; font-weight: 400; line-height: 1.25; }.status--success { color:#18733c; background:#dff5e6; }.status--success b { background:#24a45b; }.status--warning { color:#895d00; background:#fff0ca; }.status--warning b { background:#e5a605; }.status--error { color:#9e2525; background:#fde0e0; }.status--error b { background:#dc4545; }
.availability-list span { display: inline-flex; align-items: center; gap: 6px; padding: 6px 8px; border: 1px solid #e0ddd7; border-radius: 5px; color: #4e535d; font-size: 10px; }.availability-list .is-muted { color: #a0a2a5; }.dot { width: 7px; height: 7px; border-radius: 50%; background: #b3b6bc; }.dot--new { background: #ef3152; }.dot--stock { background: #2caa61; }.dot--limited { background: #f2b31e; }

.design-system__footer { display: flex; justify-content: space-between; gap: 18px; padding: 17px 0 0; color: #676c75; font-size: 10px; }.design-system__footer p:first-child { color: var(--ds-ink); font-weight: 700; letter-spacing: .03em; }

@media (max-width: 960px) {
  .design-system__masthead { grid-template-columns: 130px 1fr 100px; }.masthead__description { display: none; }.two-column-layout, .controls-grid { grid-template-columns: 1fr; }.type-section, .control-sample--form { padding-left: 0; border-left: 0; }.type-section { border-bottom: 1px solid var(--ds-rule); }.metrics-grid, .patterns-grid { gap: 22px; }.metric-block + .metric-block, .patterns-grid > article + article { padding-left: 22px; }
}

@media (max-width: 680px) {
  .design-system { padding: 18px 16px 28px; }.design-system__masthead { grid-template-columns: 1fr auto; gap: 15px; }.masthead__title { grid-row: 2; grid-column: span 2; padding: 15px 0 0; border-top: 1px solid var(--ds-rule); border-left: 0; }.masthead__version { padding-left: 15px; }.foundation-grid, .metrics-grid, .patterns-grid { grid-template-columns: 1fr 1fr; }.foundation-card { padding: 15px 10px; border-bottom: 1px solid var(--ds-rule); }.foundation-card:nth-child(2n) { border-right: 0; }.foundation-card__glyph { font-size: 34px; }.metric-block + .metric-block, .patterns-grid > article + article { padding-left: 0; border-left: 0; }.metric-block { padding-bottom: 12px; border-bottom: 1px solid var(--ds-rule); }.metric-block:last-child, .patterns-grid > article:last-child { border-bottom: 0; }.metrics-grid .metric-block:last-child, .patterns-grid > article:last-child { grid-column: span 2; }.controls-grid { gap: 22px; }.control-sample--form { padding-top: 22px; border-top: 1px solid var(--ds-rule); }.color-grid { grid-template-columns: repeat(2, 1fr); }.type-showcase { grid-template-columns: 92px 1fr; gap: 15px; }.display-alphabet, .body-alphabet { font-size: 50px; }.type-scale__display { font-size: 24px; }.status-list { grid-template-columns: 1fr; }.form-specimens { grid-template-columns: 1fr; }.form-field--wide { grid-column: span 1; }.button-specimens { grid-template-columns: 1fr; }.button-specimens > div:last-child { grid-column: span 1; max-width: none; }.design-system__footer { display: grid; }.radius-scale, .shadow-scale { gap: 7px; }
}
</style>
