<?php

$db = parse_url(getenv("postgres://sdfesvnqsrvuct:570c0d8089b6eba4b318b124ef30d1b5c7f20e38eaa4ff3211903371fa25e4e5@ec2-54-217-195-234.eu-west-1.compute.amazonaws.com:5432/d4p9o9uhhjkbfb"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

$sql = file_get_contents('./leboncon.sql');

var_dump($query->execute($sql));
