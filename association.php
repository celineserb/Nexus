<html>
<head>
	<title>bienvenue sur NEXUS</title>
</head>
<body>

</body>
</html>
<body>
	<?php
	//Connexion à la base de données
	try {
    $bdd = new PDO('mysql:host=localhost;dbname=nexus', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $e) {
    	die('Erreur : ' . $e->getMessage());
	}
	$bdd->query('SET NAMES utf8');

	$reponse = $bdd->prepare('insert into association(name,mail,password) values (:nom,:email,:motdepasse)');
	$reponse->execute(['nom' => $_POST["name"], 'email' => $_POST["mail"], 'motdepasse' => $_POST["password"]]);
		echo 'inscription réussite bienvenue sur nexus...';
		header('location:item.html');
	?>

</body>