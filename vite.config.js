import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'], // Tentukan file input yang benar
      refresh: true,
    }),
    vue(), // Vue plugin sudah cukup tanpa input di sini
    tailwindcss(),
  ],
});
