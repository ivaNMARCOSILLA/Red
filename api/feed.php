<?php require __DIR__.'/../inc/db.php';
$cursor = intval($_GET['cursor']?? 0);
$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 20 OFFSET :c");
$stmt->bindValue(':c',$cursor,PDO::PARAM_INT);
$stmt->execute();
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));