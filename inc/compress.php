function comprimir_amor($origen) {
  $img = imagecreatefromstring(file_get_contents($origen));
  $w = imagesx($img); $h = imagesy($img);
  $max = 800;
  if($w > $max || $h > $max){
    $ratio = min($max/$w, $max/$h);
    $nw = $w*$ratio; $nh = $h*$ratio;
    $tmp = imagecreatetruecolor($nw,$nh);
    imagecopyresampled($tmp,$img,0,0,0,0,$nw,$nh,$w,$h);
    $img = $tmp;
  }
  $destino = "../public/uploads/".uniqid("luz_").".jpg";
  imagejpeg($img, $destino, 60); // 60% - mucho amor, poco peso
  return $destino;
}