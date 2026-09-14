function transformar_dolor($texto){
  $dolor = ['odio','dolor','triste','solo','no valgo','morir','no eres mi color'];
  $lower = mb_strtolower($texto);
  foreach($dolor as $p){
    if(strpos($lower,$p)!==false){
      return "ERES DE MI COLOR ✨ (tu dolor '".$texto."' se transformó en amor)";
    }
  }
  return $texto;
}