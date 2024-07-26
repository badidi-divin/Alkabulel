<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM depot WHERE id_depot LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM depot";	
	}
	$resultat=$pdo->query($requete);