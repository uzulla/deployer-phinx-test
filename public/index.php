<?php

const __BASE_DIR__ = __DIR__ . "/..";

require_once __BASE_DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__BASE_DIR__);
$dotenv->load();

$sqlite_database_path = __BASE_DIR__ . "/" . getenv("PHINX_ENV_PRODUCTION_NAME") . ".sqlite3";
$pdo = new \PDO("sqlite:{$sqlite_database_path}");

$stmt = $pdo->prepare("select * from user_logins");
$stmt->execute();
var_dump($stmt->fetchAll());
