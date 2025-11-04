import devtoolsJson from 'vite-plugin-devtools-json';
import { defineConfig } from 'vitest/config';
import { sveltekit } from '@sveltejs/kit/vite';
import { phpkit } from './src/lib/index.js';

export default defineConfig({
	plugins: [
		sveltekit(),
		devtoolsJson(),
		phpkit({ endpoint: 'http://localhost/svelte/sveltekit-connector-php/src/php/index.php' })
	],
	test: {
		expect: { requireAssertions: true },
		projects: [
			{
				extends: './vite.config.js',
				test: {
					name: 'server',
					environment: 'node',
					include: ['src/**/*.{test,spec}.{js,ts}'],
					exclude: ['src/**/*.svelte.{test,spec}.{js,ts}']
				}
			}
		]
	}
});
