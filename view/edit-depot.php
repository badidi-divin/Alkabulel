<?php 
      session_start();
      require_once('../bdd/connexion.php');
      require_once('../model/edit-depot.php');
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
                            <h3>EDITION DU DEPOT DU CLIENT</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Numéro Compte</label>
                                     <select name="num_compte" class="form-control" autocomplete="off" required="required">
                                        <?php

                                            $ps=$pdo->prepare("SELECT * FROM ouverture");

                                            $params=array($id);

                                            $ps->execute($params);
                                            ?>
                                                <option disabled="disabled">
                                                    Choisissez une rubrique
                                                </option>
                                                <?php
                                            while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                                ?>
                                                <option value="<?php echo $s->id_compte; ?>">
                                                    <?php echo $s->id_compte; ?>
                                                </option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Montant Versé</label>
                                    <input class="au-input au-input--full" type="number" name="montant_verse" placeholder="Montant versé" value="<?= $userinfo['montant_verse'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Mois</label>
                                    <input class="au-input au-input--full" type="number" name="mois" placeholder="Mois"  required="required" value="<?= $userinfo['mois'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Année</label>
                                    <input class="au-input au-input--full" type="number" name="annee" placeholder="Année" required="required" value="<?= $userinfo['annee'] ?>">
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie">Edition</button>
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