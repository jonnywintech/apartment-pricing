import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/pricing_period/create.css",
                "resources/js/init.js",
            ],
            refresh: true,
        }),
    ],
});
