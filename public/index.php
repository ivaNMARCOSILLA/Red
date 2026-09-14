<?php require __DIR__.'/../inc/db.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PARAISO - LA VIDA ES UN AMOR</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>PARAISO</h1>
  <p>Admins: RAUL MARCVOS • IVAN — LA VIDA ES UN AMOR</p>
  <button onclick="dejarCentimo()">Dejar 1.000.000 euros de amor 💛</button>
</header>

<main id="feed"></main>

<div id="subir">
  <input type="file" id="imgInput" accept="image/*">
  <input type="text" id="userInput" placeholder="Tu nombre">
  <button onclick="subirPost()">Subir con amor (comprime)</button>
</div>

<script src="app.js"></script>
</body>
</html>