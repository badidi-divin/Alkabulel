<?php 
 if (isset($_POST['envoie'])) {
        $montant=htmlspecialchars($_POST['montant']);
        $devise=htmlspecialchars($_POST['devise']);
        $errors=array();
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("INSERT INTO type_compte(montant,devise)VALUES(?,?)");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($montant,$devise);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Enregistrement Effectué avec Succès!')
        </script>
        <script>
            window.open('compte.php','_self')
        </script>
        <?php
        
            exit();

    }