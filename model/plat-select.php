<?php 
   require_once('../bdd/connexion.php');
   
   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
    
    if (isset($_GET['search'])) {
        $requete="SELECT * FROM plat WHERE designation LIKE '%$mot1%'";   
        
        
    }else{
        $requete="SELECT * FROM plat";    
    }
	
  $requser=$pdo->prepare($requete);
  $requser->execute();

  $data=$requser->fetchAll(PDO::FETCH_OBJ);
  $requser->closeCursor();
