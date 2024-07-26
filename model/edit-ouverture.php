<?php 
 
 if (isset($_POST['envoie'])) {
        $code_cli=htmlspecialchars($_POST['code_cli']);
        $num_compte=htmlspecialchars($_POST['num_compte']);
        $errors=array();

        $requser=$pdo->prepare("SELECT * FROM type_compte WHERE num_type=?");
        $requser->execute(array($num_compte));
        $userinfo=$requser->fetch();
        $montant=$userinfo['montant'];
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE ouverture code_cli=?,num_compte=?,montant=? WHERE id_compte=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($code_cli,$num_compte,$montant,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Modification Effectuée avec Succès!')
        </script>
        <script>
            window.open('ouverture.php','_self')
        </script>
        <?php
        
            exit();

    }