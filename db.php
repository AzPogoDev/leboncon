<?php

$pdo = new PDO('postgres://sdfesvnqsrvuct:570c0d8089b6eba4b318b124ef30d1b5c7f20e38eaa4ff3211903371fa25e4e5@ec2-54-217-195-234.eu-west-1.compute.amazonaws.com:5432/d4p9o9uhhjkbfb');

$sql = file_get_contents('./leboncon.sql');

$query = $pdo->query($sql);

var_dump($query->execute());