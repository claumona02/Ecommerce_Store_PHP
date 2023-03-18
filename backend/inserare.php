<?php
include("conectare.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
$id = htmlentities($_POST['id'], ENT_QUOTES);
$nume = htmlentities($_POST['nume'], ENT_QUOTES);
$pret = htmlentities($_POST['pret'], ENT_QUOTES);
$imagine = htmlentities($_POST['imag'], ENT_QUOTES);
$categorie = htmlentities($_POST['categ'], ENT_QUOTES);
$descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
$stare = htmlentities($_POST['stare'], ENT_QUOTES);
// verificam daca sunt completate
if ($id == '' || $nume == ''||$pret==''||$imagine==''||$categorie==''||$descriere==''||$stare=='')
{
// daca sunt goale se afiseaza un mesaj
$error = 'ERROR: Campuri goale!';
} else {
// insert
if ($stmt = $mysqli->prepare("INSERT into produse (produs_id, produs_nume ,produs_pret ,produs_img ,produs_categ ,produs_descriere ,produs_stare
) VALUES (?, ?, ?, ?, ?, ?,?)"))
{
$stmt->bind_param("dsdssss", $id, $nume,$pret,$imagine,$categorie,$descriere,$stare);
$stmt->execute();
$stmt->close();
}
// eroare le inserare
else
{
echo "ERROR: Nu se poate executa insert.";
}
}
}
// se inchide conexiune mysqli
$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head> <title><?php echo "Inserare inregistrare"; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head> <body>
<h1><?php echo "Inserare inregistrare"; ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
<div>
<strong>Id: </strong> <input type="text" name="id" value=""/><br/>
<strong>Nume: </strong> <input type="text" name="nume" value=""/><br/>
<strong>Pret: </strong> <input type="text" name="pret" value=""/><br/>
<strong>Imagine: </strong> <input type="text" name="imag" value=""/><br/>
<strong>Categorie: </strong> <input type="text" name="categ" value=""/><br/>
<strong>Descriere: </strong> <input type="text" name="descriere" value=""/><br/>
<strong>Stare: </strong> <input type="text" name="stare" value=""/><br/>
<br/>
<input type="submit" name="submit" value="Submit" />
<a href="Vizualizare.php">Index</a>
</div></form></body></html>