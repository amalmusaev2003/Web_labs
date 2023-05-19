<?php
// Подключаемся к серверу mysql
$servername = "localhost";
$username = "root";
$password = "";

// Создаем соединение
$conn = new mysqli($servername, $username, $password);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Создаем базу данных с именем web
$sql = "CREATE DATABASE web";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Выбираем базу данных web
$conn->select_db("web");

// Создаем таблицу с именем ads с полями id, title, description, price, image
$sql = "CREATE TABLE web.ad (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(255) NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT,
price DECIMAL(10,2) NOT NULL,
image VARCHAR(255)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>
