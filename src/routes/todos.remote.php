<?php

$db = dirname(__FILE__) . '/todos.json';

if (!is_file($db)) {
    file_put_contents($db, json_encode([
        ['id' => 1, 'title' => 'Todo 1'],
        ['id' => 2, 'title' => 'Todo 2']
    ]));
}

function queryTodos()
{
    global $db;
    return json_decode(file_get_contents($db), true);
}

function formCreateTodo()
{
    global $db;

    $todos = queryTodos();
    $title = $_POST['title'];

    $todos[] = ['id' => count($todos) + 1, 'title' => $title];

    file_put_contents($db, json_encode($todos));

    return $todos;
}

function formDeleteTodo()
{
    global $db;

    $todos = queryTodos();
    $id = $_POST['id'];

    foreach ($todos as $key => $todo) {
        if ($todo['id'] === $id) {
            unset($todos[$key]);
            file_put_contents($db, json_encode($todos));
            return $todos;
        }
    }

    return $todos;
}
