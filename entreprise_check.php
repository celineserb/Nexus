
<html>
<head>
	<title> verification </title>
</head>
<body>

</body>
</html>
<?php  
//Connexion à la base de données
	try {
    $bdd = new PDO('mysql:host=localhost;dbname=nexus', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $e) {
    	die('Erreur : ' . $e->getMessage());
	}
	$bdd->query('SET NAMES utf8');
	$pass=$_POST["password"];
	$t=false;
$reponse = $bdd->prepare('select * from entreprise where mail=:email');
$reponse->execute(['email'=>$_POST["mail"]]);
while ($donnees = $reponse->fetch()) {
    if ($donnees["mail"]==$_POST["mail"]) {
    	$t=true;
    	if ($donnees["password"]==$_POST["password"]) {
    		$s=true;
    		echo"connection...";
    		header('location:cathalogue_entreprise.html'); /* la redirection vers le catalogue pour entreprire*/
    		break;
    	}
    	
    }
}
if ($t==false) {
	echo"adresse email incorrecte <br>";
	header('location:incorrect_entreprise.html');
}
if ($s==false) {
	echo"mot de passe incorrect<br>";
	header('location:incorrect_entreprise.html');
}
?>