<?php 
	if (isset($_POST['envoie'])) {
		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$sexe=htmlspecialchars($_POST['sexe']);
		$email=htmlspecialchars($_POST['email']);
		$telephone=htmlspecialchars($_POST['phone']);
		$adresse=htmlspecialchars($_POST['adresse']);

		if (strlen($nom_complet > 5) AND strlen($nom_complet <30)){
			$errors="Votre nom_complet doit avoir 5 à 20 caractères!";
		}
		

		if (empty($_POST['phone']) || !preg_match('/^[0-9_+]+$/', $_POST['phone'])) {
					$errors="Votre numéro de télephone n'est pas valide";
				}
				else
				{
					$req=$pdo->prepare('SELECT id FROM client WHERE telephone=?');
					$req->execute([$_POST['phone']]);
					$user=$req->fetch();
					if ($user) {
						$errors='Ce numéro de télephone est déjà pris';
					}
					if (strlen($telephone)>15) {
						$errors="Votre numéro de télephone est incorrect(trop long valeur maximum de caractères 15)";
					}
				}
		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors="Votre email n'est pas valide";
			}
			else
			{
				$req=$pdo->prepare('SELECT id FROM client WHERE email=?');
				$req->execute([$_POST['email']]);
				$user=$req->fetch();
				if ($user) {
					$errors='Cet email est déjà pris';
				}
			}

		if (empty($errors)) {
			
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO client(nom_complet,sexe,telephone,email,adresse)VALUES(?,?,?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom_complet,$sexe,$telephone,$email,$adresse);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Enregistrement Effectué avec Succès!')
			</script>
			<script>
				window.open('dashbord.php','_self')
			</script>
			<?php

			exit();				
		}
				 
	
	}


