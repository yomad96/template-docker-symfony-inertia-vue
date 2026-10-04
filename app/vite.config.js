import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';
import { fileURLToPath, URL } from 'node:url';

/* if you're using React */
// import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        vue(),
        tailwindcss(),
        symfonyPlugin({
            // Le serveur écoute sur 0.0.0.0 dans Docker, mais le navigateur
            // doit charger les assets depuis l'hôte local exposé.
            viteDevServerHostname: 'localhost',
        }),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./assets', import.meta.url)),
        },
    },
    build: {
        rollupOptions: {
            input: {
                app: "./assets/app.js"
            },
        }
    },
});
