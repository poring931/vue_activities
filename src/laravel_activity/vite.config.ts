import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import stylelint from 'vite-plugin-stylelint';
import AutoImport from 'unplugin-auto-import/vite'
import * as path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@': path.resolve('', './resources/js/vue'),
            // '@': path.resolve('./resources/js/vue/', './resources/js/vue'),
            // '@':'./resources/js/vue',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/vue/main.ts'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        AutoImport({
            include: [
                /\.[tj]sx?$/, // .ts, .tsx, .js, .jsx
                /\.vue$/,
                /\.vue\?vue/, // .vue
                /\.md$/ // .md
            ],

            // global imports to register
            imports: [
                // presets
                'vue',
                'vue-router',
                // custom
                {
                    axios: [
                        // default imports
                        ['default', 'axios'] // import { default as axios } from 'axios',
                    ]
                }
            ]
        }),
        stylelint({
            // recommend to enable auto fix
            fix: true,
        }),
    ],
    optimizeDeps: {
        include: ['vue']
    },
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
});
