<?php 
	require_once('../bdd/connexion.php');
	$requser=$pdo->prepare("SELECT * FROM client WHERE id_cli=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();
	$sexe=$userinfo['sexe'];

	 if (isset($_POST['envoie'])) {
        $nom_cli=htmlspecialchars($_POST['nom_cli']);
        $postnom_cli=htmlspecialchars($_POST['postnom_cli']);
        $pren_cli=htmlspecialchars($_POST['pren_cli']);
        $sexe=htmlspecialchars($_POST['sexe']);
        $email=htmlspecialchars($_POST['email']);
        $tel_cli=htmlspecialchars($_POST['tel_cli']);
        $adress_cli=htmlspecialchars($_POST['adress_cli']);
        $errors=array();
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE client nom_cli=?,postnom_cli=?,pren_cli=?,sexe=?,email=?,tel_cli=?,adress_cli=? WHERE id_cli=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($nom_cli,$postnom_cli,$pren_cli,$sexe,$email,$tel_cli,$adress_cli,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Modification Effectuée avec Succès!')
        </script>
        <script>
            window.open('dashbord.php','_self')
        </script>
        <?php
        
            exit();

    }