<?php 
      session_start();
      require_once('../bdd/connexion.php');
      require_once('../model/insert-client.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>AJOUT DU CLIENT</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Nom du client</label>
                                    <input class="au-input au-input--full" type="text" name="nom_cli" placeholder="Nom du client">
                                </div>
                                <div class="form-group">
                                    <label> Post-Nom du client</label>
                                    <input class="au-input au-input--full" type="text" name="postnom_cli" placeholder="Post-Nom">
                                </div>
                                <div class="form-group">
                                    <label> Prénom du client</label>
                                    <input class="au-input au-input--full" type="text" name="pren_cli" placeholder="Prénom">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Sexe:</label>
                                    <select name="sexe" class="form-control" autocomplete="off" required="required">
                                        <option value="Masculin">
                                            Masculin
                                        </option>
                                        <option value="Féminin">
                                            Féminin
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="e-mail">
                                </div>
                                <div class="form-group">
                                    <label> Télephone du client</label>
                                    <input class="au-input au-input--full" type="text" name="tel_cli" placeholder="Télephone">
                                </div>
                                <div class="form-group">
                                    <label> Adresse du client</label>
                                    <input class="au-input au-input--full" type="text" name="adress_cli" placeholder="Adresse">
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

    <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->