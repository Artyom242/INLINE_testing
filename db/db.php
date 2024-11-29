<?php

require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$DB_HOST = $_ENV['DB_HOST'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_USERNAME = $_ENV['DB_USERNAME'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];

try {
    $db = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST", $DB_USERNAME, $DB_PASSWORD);
} catch (PDOException $e) {
    die($e->getMessage());
}