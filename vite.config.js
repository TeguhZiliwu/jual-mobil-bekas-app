import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/pre-loader.css', 
                'resources/js/app.js',

                'resources/js/main.js',
                'resources/js/pages/auth/signin.js',
                'resources/js/pages/auth/signup.js',
                'resources/js/pages/masters/user.js',
                'resources/js/pages/masters/brand.js',
                'resources/js/pages/masters/item.js',
                'resources/js/pages/transactions/car-for-sale.js',

                'resources/js/pages/masters/unit-of-measurement.js',
                'resources/js/pages/masters/supplier.js',
                'resources/js/pages/masters/supplier-contact.js',
                'resources/js/pages/transactions/stock-in.js',
            ],

            refresh: true,
        }),
    ]
});
