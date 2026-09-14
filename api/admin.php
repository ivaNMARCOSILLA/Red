// Solo RAUL MARCVOS e IVAN
session_start();
if($_SESSION['admin'] !== 'RAUL MARCVOS' && $_SESSION['admin'] !== 'IVAN') exit;

if(trim($_POST['palabra']) === 'INMOLAS'){
  $db->exec("DELETE FROM usuarios WHERE id = ".intval($_POST['id']));
  echo json_encode(["msg"=>"Usuario expulsado con amor. LA VIDA ES UN AMOR"]);
}