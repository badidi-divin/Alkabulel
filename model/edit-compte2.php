<?php 
    require_once('../bdd/connexion.php');
    $requser=$pdo->prepare("SELECT * FROM type_compte WHERE num_type=?");
    $requser->execute(array($_GET['id']));
    $userinfo=$requser->fetch();

 if (isset($_POST['envoie'])) {
        $montant=htmlspecialchars($_POST['montant']);
        $devise=htmlspecialchars($_POST['devise']);
        $errors=array();
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE type_compte SET montant=?,devise=? WHERE num_type=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($montant,$devise,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Edition Effectuée avec Succès!')
        </script>
        <script>
            window.open('compte.php','_self')
        </script>
        <?php
        
            exit();

    }