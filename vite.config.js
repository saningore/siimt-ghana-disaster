import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/ghana-disaster.css',
                'resources/js/app.js',
                'resources/js/alerts-map.js',
                'resources/js/history-chart.js',
                'resources/js/weather-forecast.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
