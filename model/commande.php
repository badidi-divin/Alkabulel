<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('function_panier.php');
	$products= '';

	$total=montantglobal();


	// Géneration code de la commande
	$requser=$pdo->prepare("SELECT * FROM commande ORDER BY code_commande DESC LIMIT 1");
	$requser->execute();
	$userinfo=$requser->fetch();

	$lastid=$userinfo['code_commande'];

	if ($lastid=="") {
		$matr="Com/101";
	}
	else
	{
		$matr=substr($lastid, 4);
		$matr=intval($matr);
		$matr="Com/".($matr+1);
	}
	
	$name=$_SESSION['nom_complet'];
	
	$ps=$pdo->prepare("INSERT INTO commande(code_commande,pt,client)VALUES(?,?,?)");
    //Pour bien recupere les données on crée un table de parametre
    $params=array($matr,$total,$name);
    //Execution de la requête par leur paramètre en ordre 
    $ps->execute($params);
    // Pour recuperer l'id du user

    for ($i=0; $i < count($_SESSION['panier']['libelleproduit']); $i++) { 
		$product=$_SESSION['panier']['libelleproduit'][$i];
		$quantity=$_SESSION['panier']['qteproduit'][$i];
		$prix=$_SESSION['panier']['prixproduit'][$i];
		$ps=$pdo->prepare("INSERT INTO detail_commande(code_commande,plat,qte_com,prix)VALUES(?,?,?,?)");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($matr,$product,$quantity,$prix);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps->execute($params);

	 }

    ?>
    <script type="text/javascript">
        alert('Votre commande a été reçu avec succès.merci d\'avoir choisis Geleto!')
        window.open('../view/pannier.php?deletepanier=true','_self')
    </script>