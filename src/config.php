<?php

//______________________________#database config array______________________________

$database_config = (object) [
    'host'    => 'localhost',
    'user'    => 'root',
    'pass'    => '',
    'dbname'  => 'web'
];

//______________________________#create database if not exists______________________________

$conn = new mysqli($database_config->host, $database_config->user, $database_config->pass);
$sql = "CREATE DATABASE IF NOT EXISTS web";
$conn->query($sql);
$conn->close();

//______________________________#database connection with PDO______________________________

try {
    $pdo = new PDO("mysql:host={$database_config->host};dbname={$database_config->dbname}", $database_config->user, $database_config->pass);
    $pdo->exec('set names utf8');
} catch (Exception $e) {
    die("There is something wrong with connection, error: " . $e->getMessage());
}

//______________________________#create table if not exists______________________________

$sql2 = "CREATE TABLE IF NOT EXISTS users (
    fname varchar(60) NOT NULL,
    username varchar(60) NOT NULL,
    password varchar(60) NOT NULL,
    email varchar(90) NOT NULL,
    cookie varchar(90) NOT NULL,
    PRIMARY KEY (username)
    )";

$pdo->query($sql2);

?>