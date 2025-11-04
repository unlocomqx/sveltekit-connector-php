# SvelteKit Connector for PHP

This is a proof of concept showing how it can be possible to connect a SvelteKit frontend to a PHP backend using remote
functions.

## Usage

```shell
bun install
bun run dev
; I'm assuming you have a php server running on your machine
```

## Conventions

Prefix your PHP function with `query`, `form`, or `command` to indicate its type. For example:- `queryTodos`

- `formCreateTodo`
- `commandDeleteTodo`
- `queryTodoByID`
- `commandUpdateTodo`

## Contributing

This is a POC, feel free to contribute to make it better.

## Todos

- [ ] Handle function parameters
- [ ] Fix types for "virtual" js module
- [ ] Improve error handling
- [ ] Reload Vite server when a php file changes
