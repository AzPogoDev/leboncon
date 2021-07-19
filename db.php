<?php

$db = parse_url(getenv("postgres://hwpsldeappbnge:9c7e3896a57f438616d1d75db9bcede7d30c8f830bb0f80b0376118ed38807d9@ec2-54-155-87-214.eu-west-1.compute.amazonaws.com:5432/ds4d1s31itdhs"));

$pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

$sql = file_get_contents('./leboncon.sql');

var_dump($pdo->exec($sql));