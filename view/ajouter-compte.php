<?php 
      session_start();
      require_once('../bdd/connexion.php');
      require_once('../model/insert-compte.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>AJOUT DU TYPE DE COMPTE</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Montant</label>
                                    <input class="au-input au-input--full" type="number" name="montant" placeholder="Montant">
                                </div>
                                <div class="form-group">
                                    <label> Devise</label>
                                    <input class="au-input au-input--full" type="text" name="devise" placeholder="Devise">
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie">Ajouter</button>
                            </form>
                           <?php
                                    if (isset($erreur)) {
                                        echo "<font color='red'>".$erreur."</font>";
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->