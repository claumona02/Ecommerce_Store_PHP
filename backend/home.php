<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
header('Location:index.php');
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Pagina proiect parolata</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"
href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
<div class="bara">
<h1>ELECTRIX</h1>
<div class="butoane_bara">
<a href="autentificare.php"><i class="fas fa-usercircle"></i>Profile</a>
<a href="logout.php"><i class="fas fa-sign-outalt"></i>Logout</a>
<a href="magazin.php"><i class="fas fa-sign-outalt"></i>Du-ma la magazin</a>
</div>
</div>
</nav>
<div class="content">

<p>Bine ati revenit, <?=$_SESSION['name']?>!</p>
</div>

</body>
</html>