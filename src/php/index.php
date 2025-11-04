<?php

session_start();

$path = $_GET['path'];
$fn = $_GET['fn'];

if (empty($_POST)) {
    // deal with json input
    $_POST = json_decode(file_get_contents('php://input'), true);
    if (is_null($_POST)) {
        $_POST = [];
    }
}

// !important : in production, you should guard against directory traversal
$fullpath = dirname(__FILE__, 3) . '/' . $path;

if (!is_file($fullpath)) {
    exit(json_encode(['error' => 'File ' . $fullpath . ' not found']));
}

include_once $fullpath;

if (function_exists($fn)) {
    exit(json_encode($fn()));
} else {
    exit(json_encode(['error' => 'Function ' . $fn . ' not found']));
}
