<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM retrait WHERE num_retrait LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM retrait";	
	}
	$resultat=$pdo->query($requete);