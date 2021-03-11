<?php
$pdo = new PDO("mysql:host=localhost:3307;dbname=easy_net", "root","", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
