<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Vizualizare Inregistrari</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Inregistrarile din tabela Produse</h1>
<p><b>Toate inregistrarile din magazinproiect</b</p>
<?php
// connectare bazadedate
 include("conectare.php");
// se preiau inregistrarile din baza de date
if ($result = $mysqli->query("SELECT * FROM produse ORDER BY produs_id "))
{ // Afisare inregistrari pe ecran
if ($result->num_rows > 0)
{
// afisarea inregistrarilor intr-o table
echo "<table border='1' cellpadding='10'>";
// antetul tabelului
echo "<tr><th>ID</th><th>Nume Produs</th><th>Pret</th>
<th>Imagine</th><th>Categorie</th><th>Descriere</th><th>Stare</th><th></th><th></th></tr>";
while ($row = $result->fetch_object())
{
// definirea unei linii pt fiecare inregistrare
echo "<tr>";
echo "<td>" . $row->produs_id . "</td>";
echo "<td>" . $row->produs_nume . "</td>";
echo "<td>" . $row->produs_pret . "</td>";
echo "<td>" . $row->produs_img . "</td>";
echo "<td>" . $row->produs_categ . "</td>";
echo "<td>" . $row->produs_descriere . "</td>";
echo "<td>" . $row->produs_stare . "</td>";
echo "<td><a href='modificare.php?id=" . $row->produs_id . "'>Modificare</a></td>";
echo "<td><a href='stergere.php?id=" .$row->produs_id . "'>Stergere</a></td>";
echo "</tr>";
}
echo "</table>";
}
// daca nu sunt inregistrari se afiseaza un rezultat de eroare
else
{
echo "Nu sunt inregistrari in tabela!";
}
}
// eroare in caz de insucces in interogare
else
{ echo "Error"; }
// se inchide
$mysqli->close();
?>
<a href="inserare.php">Adaugarea unei noi inregistrari</a>
</body>
</html>