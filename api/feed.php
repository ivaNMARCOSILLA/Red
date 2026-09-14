<?php
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/../inc/db.php';

$cursor = intval($_GET['cursor'] ?? 0);
$posts = [];

try {
    $db = getDB();
    $stmt = $db->query("SELECT id, usuario, imagen, 0 as comentarios_count FROM posts ORDER BY id DESC LIMIT 20 OFFSET $cursor");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // arregla la ruta de la imagen para que funcione en public
    foreach($posts as &$p){
        $p['imagen'] = str_replace('../','/',$p['imagen']);
        $p['imagen'] = str_replace('data/','/',$p['imagen']);
        if(strpos($p['imagen'],'/uploads')===false) $p['imagen'] = '/uploads/'.basename($p['imagen']);
    }
} catch(Exception $e) { $posts = []; }

// SI LA BD ESTA VACIA, ENSEÑA LAS 6 FOTOS FIJAS DE public/uploads
if(empty($posts) && $cursor==0){
    $dir = __DIR__ . '/../public/uploads';
    if(is_dir($dir)){
        $files = array_diff(scandir($dir), ['.', '..', 'desktop.ini']);
        rsort($files);
        foreach($files as $f){
            if(preg_match('/\.(jpg|jpeg|png|webp)$/i', $f)){
                $posts[] = [
                    'id' => crc32($f),
                    'usuario' => 'IVAN - PARAISO FIJO',
                    'imagen' => '/uploads/' . rawurlencode($f),
                    'comentarios_count' => 7
                ];
            }
        }
    }
}

echo json_encode($posts, JSON_UNESCAPED_UNICODE);