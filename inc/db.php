<?php
$pdo = new PDO('sqlite:'.__DIR__.'/../data/paraiso.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("CREATE TABLE IF NOT EXISTS posts (id INTEGER PRIMARY KEY, usuario TEXT, imagen TEXT, comentarios_count INT DEFAULT 0)");
$pdo->exec("CREATE TABLE IF NOT EXISTS comentarios (id INTEGER PRIMARY KEY, post_id INT, texto TEXT, texto_original TEXT)");
$pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nombre TEXT)");