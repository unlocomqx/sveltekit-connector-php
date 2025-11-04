<script lang="ts">
	// still can't get .d.ts to work
	import { queryUserInfo } from './users.remote.php';

	let infos = $state({});
</script>

<h1>SvelteKit Connector for PHP</h1>
<p>Connect your SvelteKit frontend to PHP backend easily using this library.</p>

<button onclick={async () => (infos = await queryUserInfo())}> Fetch user info </button>

<div>
	{JSON.stringify(infos)}
</div>
