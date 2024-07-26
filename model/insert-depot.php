<?php 
 if (isset($_POST['envoie'])) {
        $num_compte=htmlspecialchars($_POST['num_compte']);
        $montant_verse=htmlspecialchars($_POST['montant_verse']);
        $mois=htmlspecialchars($_POST['mois']);
        $annee=htmlspecialchars($_POST['annee']);
        $errors=array();
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("INSERT INTO depot(num_compte,montant_verse,mois,annee)VALUES(?,?,?,?)");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($num_compte,$montant_verse,$mois,$annee);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Enregistrement Effectué avec Succès!')
        </script>
        <script>
            window.open('depot.php','_self')
        </script>
        <?php
        
            exit();

    }