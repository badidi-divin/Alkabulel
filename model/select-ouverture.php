<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM ouverture WHERE id_compte LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM ouverture";	
	}
	$resultat=$pdo->query($requete);