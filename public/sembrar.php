<?php require __DIR__.'/../inc/db.php';
$pdo->exec("INSERT INTO posts (usuario, imagen) VALUES 
('RAUL MARCVOS','https://picsum.photos/600/600?random=1'),
('IVAN','https://picsum.photos/600/600?random=2'),
('ALMA DE COLOR','https://picsum.photos/600/600?random=3')");
echo "Sembrado - ya hay 3 imágenes";