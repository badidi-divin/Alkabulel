<?php 
    // Generation Matricule
    $requser=$pdo->prepare("SELECT * FROM ouverture ORDER BY id_compte DESC LIMIT 1");
    $requser->execute();
    $userinfo=$requser->fetch();

    $lastid=$userinfo['id_compte'];

    if ($lastid=="") {
        $matr="K-1001";
    }
    else
    {
        $matr=substr($lastid, 2);
        $matr=intval($matr);
        $matr="K-".($matr+1);
    }
    // End Generation

 if (isset($_POST['envoie'])) {
        $code_cli=htmlspecialchars($_POST['code_cli']);
        $num_compte=htmlspecialchars($_POST['num_compte']);
        $errors=array();

        $requser=$pdo->prepare("SELECT * FROM type_compte WHERE num_type=?");
        $requser->execute(array($num_compte));
        $userinfo=$requser->fetch();
        $montant=$userinfo['montant'];
       
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("INSERT INTO ouverture(id_compte,code_cli,num_compte,montant)VALUES(?,?,?,?)");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($matr,$code_cli,$num_compte,$montant);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
            alert('Enregistrement Effectué avec Succès!')
        </script>
        <script>
            window.open('ouverture.php','_self')
        </script>
        <?php
        
            exit();

    }