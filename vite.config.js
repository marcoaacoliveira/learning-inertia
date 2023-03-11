import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue"; //add this line
import laravel from 'laravel-vite-plugin';
import DefineOptions from 'unplugin-vue-define-options/vite'

export default defineConfig({
    plugins: [
        vue(),
        DefineOptions(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
