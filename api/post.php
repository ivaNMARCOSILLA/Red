<?php require __DIR__.'/../inc/db.php'; require __DIR__.'/../inc/compress.php';
$dest = comprimir_amor($_FILES['imagen']['tmp_name']);
$pdo->prepare("INSERT INTO posts (usuario, imagen) VALUES (?,?)")->execute([$_POST['usuario'],$dest]);
echo json_encode(["ok"=>true]);