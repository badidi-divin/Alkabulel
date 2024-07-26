<?php 
      session_start();
      require_once('../bdd/connexion.php');
      require_once('../model/edit-ouverture.php');
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
                            <h3>EDITION DU COMPTE</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label for="propri">Client:</label>
                                    <select name="code_cli" class="form-control" autocomplete="off" required="required">
                                        <?php

                                            $ps=$pdo->prepare("SELECT * FROM client");

                                            $params=array($id);

                                            $ps->execute($params);
                                            ?>
                                                <option disabled="disabled">
                                                    Choisissez une rubrique
                                                </option>
                                                <?php
                                            while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                                ?>
                                                <option value="<?php echo $s->id_cli; ?>">
                                                    <?php echo $s->nom_cli." ".$s->postnom_cli." ".$s->pren_cli; ?>
                                                </option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="propri">Type de Compte:</label>
                                    <select name="num_compte" class="form-control" autocomplete="off" required="required">
                                        <?php

                                            $ps=$pdo->prepare("SELECT * FROM type_compte");

                                            $params=array($id);

                                            $ps->execute($params);
                                            ?>
                                                <option disabled="disabled">
                                                    Choisissez une rubrique
                                                </option>
                                                <?php
                                            while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
                                                ?>
                                                <option value="<?php echo $s->num_type; ?>">
                                                    <?php echo $s->montant.'('.$s->devise.')'; ?>
                                                </option>
                                                <?php
                                            }
                                        ?>
                                    </select>
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