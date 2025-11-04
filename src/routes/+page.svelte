<script lang="ts">
	// still can't get .d.ts to work
	import { formCreateTodo, queryTodos, formDeleteTodo } from './todos.remote.php';
</script>

<h1>SvelteKit Connector for PHP</h1>
<p>Connect your SvelteKit frontend to PHP backend easily using this library.</p>

<div>
	<h2>Todos list:</h2>
	{#each await queryTodos() as { id, title } (id)}
		<form {...formDeleteTodo.for(id)}>
			<span>{title}</span>
			<button>Delete</button>
			<br />
			<br />
		</form>
	{/each}

	<form method="post" {...formCreateTodo}>
		<input name="title" type="text" value="New todo" />
		<button type="submit">Add</button>
	</form>
</div>

<p>
	<a href="/users">Users</a>
</p>
