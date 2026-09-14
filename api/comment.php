<?php require __DIR__.'/../inc/db.php'; require __DIR__.'/../inc/love_filter.php';
$texto = transformar_dolor($_POST['texto']);
$pdo->prepare("INSERT INTO comentarios (post_id, texto, texto_original) VALUES (?,?,?)")->execute([$_POST['post_id'],$texto,$_POST['texto']]);
echo json_encode(["transformado"=>$texto]);