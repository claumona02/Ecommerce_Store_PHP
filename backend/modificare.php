<?php // connectare bazadedate
include("conectare.php");
//Modificare datelor
// se preia id din pagina vizualizare
$error='';
if (!empty($_POST['id']))
{ if (isset($_POST['submit']))
{ // verificam daca id-ul din URL este unul valid
if (is_numeric($_POST['id']))
{ // preluam variabilele din URL/form
$id = $_POST['id'];
$nume = htmlentities($_POST['nume'], ENT_QUOTES);
$pret = htmlentities($_POST['pret'], ENT_QUOTES);
$img = htmlentities($_POST['img'], ENT_QUOTES);
$categorie = htmlentities($_POST['categorie'], ENT_QUOTES);
$descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
$stare = htmlentities($_POST['stare'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
if ($nume == '' || $pret == ''||$img==''||$categorie==''||$descriere==''||$stare=='')
{ // daca sunt goale afisam mesaj de eroare
echo "<div> ERROR: Completati campurile obligatorii!</div>";
}else
{ // daca nu sunt erori se face update name, code, image, price, descriere, categorie
if ($stmt = $mysqli->prepare("UPDATE produse SET
produs_nume=?,produs_pret=?,produs_img=?,produs_categ=?,produs_descriere=?, produs_stare=? WHERE produs_id='".$id."'"))
{
$stmt->bind_param("sdssss",$nume,$pret,$img,$categorie,$descriere, $stare);
$stmt->execute();
 $stmt->close();
 }// mesaj de eroare in caz ca nu se poate face update
else
{echo "ERROR: nu se poate executa update.";}
}
}
// daca variabila 'id' nu este valida, afisam mesaj de eroare
else
{echo "id incorect!";} }}?>
<html> <head><title> <?php if ($_GET['id'] != '') { echo "Modificare inregistrare"; }?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/></head>
<body>
<h1><?php if ($_GET['id'] != '') { echo "Modificare Inregistrare"; }?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
<div>
<?php if ($_GET['id'] != '') { ?>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<p>ID: <?php echo $_GET['id'];
if ($result = $mysqli->query("SELECT * FROM produse where produs_id='".$_GET['id']."'"))
{
if ($result->num_rows > 0)
{ $row = $result->fetch_object();?></p>

<strong>Nume: </strong> <input type="text" name="nume" value="<?php echo$row->produs_nume;
?>"/><br/>
<strong>Pret: </strong> <input type="text" name="pret" value="<?php echo$row->produs_pret;
?>"/><br/>
<strong>Imagine: </strong> <input type="text" name="img" value="<?php echo$row->produs_img;
?>"/><br/>
<strong>Categorie: </strong> <input type="text" name="categorie" value="<?php echo$row->produs_categ; ?>"/><br/>
<strong>Descriere: </strong> <input type="text" name="descriere" value="<?php echo$row->produs_descriere ?>"/><br/>
<strong>Stare: </strong> <input type="text" name="stare" value="<?php echo $row->produs_stare;}}}?>"/><br/>
<br/>
<input type="submit" name="submit" value="Submit" />
<a href="vizualizare.php">Index</a>
</div></form></body> </html>