<?php
	/* VALUES */
	$id=$_POST['id'];
	 
	// connexion à la base de données
	try {
	$bdd = new PDO('mysql:host=localhost;dbname=dbgogole', 'root', 'root');
	} catch(Exception $e) {
	exit('Impossible de se connecter à la base de données.');
	}
	 
	$sql = "DELETE FROM evenement WHERE id=?";
	$q = $bdd->prepare($sql);
	$q->execute(array($id));
?>