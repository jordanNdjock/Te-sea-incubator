<?php

if(isset($_POST['formData'])){
  // Récupérez les données envoyées depuis le navigateur
  $formData = $_POST['formData'];
}


// Assurez-vous que les données ont été correctement reçues
if (!empty($formData)) {
    // Transformez les données JSON en un tableau associatif en PHP
    $formDataArray = json_decode($formData, true);

    // Maintenant, vous pouvez utiliser $formDataArray pour enregistrer les données en base de données
    // Exemple : utilisez PDO pour insérer les données dans la base de données
    // Remplacez les informations de connexion à la base de données par les vôtres
    $dsn = 'mysql:host=localhost;dbname=suivi';
    $username = 'root';
    $password = '';

    try {
      // Connexion à la base de données (à adapter selon votre configuration)
      $pdo = new PDO($dsn, $username, $password);
  
      // Vérification des doublons en se basant sur le champ "email" par exemple
      $email = $formDataArray['email'];
      $sqlCheckDuplicate = "SELECT email FROM formulaire WHERE email = :email";
      $stmtCheckDuplicate = $pdo->prepare($sqlCheckDuplicate);
      $stmtCheckDuplicate->bindParam(':email', $email);
      $stmtCheckDuplicate->execute();
  
      if ($stmtCheckDuplicate->rowCount() > 0) {
        echo '<div class="alert alert-warning" role="alert">Un enregistrement avec cette adresse e-mail existe déjà.</div>';
      } else {
        $sql = "INSERT INTO formulaire (fname, lname, phone, email, level_study, hosted_web_project, worked_with_dev_team, dev_methodologies_experience, used_ide, timetable, suivie_academique, orientation_pro, dev_competence, created_at, montant) VALUES (:fname, :lname, :phone, :email, :level_study, :hosted_web_project, :worked_with_dev_team, :dev_methodologies_experience, :used_ide, :timetable, :suivie_academique, :orientation_pro, :dev_competence, NOW(),:montant)";
        $stmt = $pdo->prepare($sql);
       
        $stmt->bindValue(':fname', $formDataArray["fname"]);
        $stmt->bindValue(':lname', $formDataArray['lname']);
        $stmt->bindValue(':phone', $formDataArray['phone']);
        $stmt->bindValue(':email', $formDataArray['email']);
        $stmt->bindValue(':level_study', $formDataArray['level_study']);
        $stmt->bindValue(':hosted_web_project', $formDataArray['hosted_web_project']);
        $stmt->bindValue(':worked_with_dev_team', $formDataArray['worked_with_dev_team']);
        $stmt->bindValue(':dev_methodologies_experience', $formDataArray['dev_methodologies_experience']);
        $stmt->bindValue(':used_ide', $formDataArray['used_ide']);
        $stmt->bindValue(':timetable', $formDataArray['timetable']);
        $stmt->bindParam(':suivie_academique', $formDataArray['suivi_academique']);
        $stmt->bindParam(':orientation_pro', $formDataArray['orientation_pro']);
        $stmt->bindParam(':dev_competence', $formDataArray['dev_competence']);
        $stmt->bindParam(':montant', $formDataArray['montant']);
        
        // Exécutez la requête
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Les données ont été insérées avec succès !</div>';
            echo "<script> localStorage.clear();</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">Erreur lors de l\'insertion des données : </div>'. $stmt->errorInfo();
           
        }
      }
  } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Erreur : </div>'. $e->getMessage();
    }
} else {
    '<div class="alert alert-info" role="alert">Aucune donnée n\'a été reçue ! </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Inscription Reussie</title>

    <meta name="author" content="Codeconvey" />
    <!-- Message Box CSS -->
    <link rel="stylesheet" href="css/sucess.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
</head>
<body>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        <div class="col-rt-2">
            <ul>
                <li><a href="index.html" title="Retour a l'inscription">Retour a l'inscription</a></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Paiement pour la pré-inscription réussie</h1>
                <p>Nous allons vous contacter pour commencer votre programme </p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- partial:index.partial.html -->
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
 
      <!-- Generator: Adobe Illustrator 17.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
      <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
      <svg version="1.1" id="checkmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" xml:space="preserve">
        <path d="M131.583,92.152l-0.026-0.041c-0.713-1.118-2.197-1.447-3.316-0.734l-31.782,20.257l-4.74-12.65
	c-0.483-1.29-1.882-1.958-3.124-1.493l-0.045,0.017c-1.242,0.465-1.857,1.888-1.374,3.178l5.763,15.382
	c0.131,0.351,0.334,0.65,0.579,0.898c0.028,0.029,0.06,0.052,0.089,0.08c0.08,0.073,0.159,0.147,0.246,0.209
	c0.071,0.051,0.147,0.091,0.222,0.133c0.058,0.033,0.115,0.069,0.175,0.097c0.081,0.037,0.165,0.063,0.249,0.091
	c0.065,0.022,0.128,0.047,0.195,0.063c0.079,0.019,0.159,0.026,0.239,0.037c0.074,0.01,0.147,0.024,0.221,0.027
	c0.097,0.004,0.194-0.006,0.292-0.014c0.055-0.005,0.109-0.003,0.163-0.012c0.323-0.048,0.641-0.16,0.933-0.346l34.305-21.865
	C131.967,94.755,132.296,93.271,131.583,92.152z" />
        <circle fill="none" stroke="#ffffff" stroke-width="5" stroke-miterlimit="10" cx="109.486" cy="104.353" r="32.53" />
      </svg>
      <h3 id='status'>
      Reussie
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      Félicitation vous venez de vous pré-inscrire au programme d'orientation avec succès.
    </p>
    <a href="#" id="contBtn">Continuer</a>
  </div>
</div>
<!-- partial -->
    		
           
    		</div>
		</div>
    </div>
</section>

<script>
  // Récupérez les données du localStorage
var formData = localStorage.getItem('formData');

// Vérifiez si des données ont été trouvées dans le localStorage
if (formData) {
    // Créez un objet FormData pour envoyer les données
    var formDataToSend = new FormData();
    formDataToSend.append('formData', formData);

    // Effectuez une requête AJAX pour envoyer les données au serveur
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'success_operation.php', true);

    // Gérez la réponse de la requête AJAX
    xhr.onload = function () {
        if (xhr.status === 200) {
            // La réponse du serveur peut contenir des informations supplémentaires
            alert(xhr.responseText);
        } else {
            console.error('Erreur lors de la requête au serveur.');
        }
    };

    // Envoyez les données au serveur
    xhr.send(formDataToSend);
    // Supprimer toutes les données du localStorage
   

}

</script>


    <!-- Analytics -->

	</body>
</html>