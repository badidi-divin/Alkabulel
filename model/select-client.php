<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM client WHERE code_cli LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM client";	
	}
	$resultat=$pdo->query($requete);