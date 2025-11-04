<?php

if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [
        ['id' => 1, 'title' => 'Todo 1'],
        ['id' => 2, 'title' => 'Todo 2']
    ];
}

function queryTodos()
{
    return $_SESSION['todos'];
}

function formCreateTodo()
{
    $title = $_POST['title'];

    $_SESSION['todos'][] = ['id' => count($_SESSION['todos']) + 1, 'title' => $title];

    return $_SESSION['todos'];
}

function formDeleteTodo()
{
    $id = $_POST['id'];

    foreach ($_SESSION['todos'] as $key => $todo) {
        if ($todo['id'] === $id) {
            unset($_SESSION['todos'][$key]);
            return $_SESSION['todos'];
        }
    }

    return $_SESSION['todos'];
}
