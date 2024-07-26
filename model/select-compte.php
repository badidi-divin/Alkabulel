<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM type_compte WHERE num_type LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM type_compte";	
	}
	$resultat=$pdo->query($requete);