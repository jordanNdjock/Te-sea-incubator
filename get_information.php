<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="css/bootstrap.min.css"
    />
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include("php/connexion.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone_number = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // choix du niveau
    $choix_niveau = filter_input(INPUT_POST, 'choix_niveau', FILTER_SANITIZE_SPECIAL_CHARS);

    //choix de l'emploi du temps
    $timetable = filter_input(INPUT_POST, 'timetable', FILTER_SANITIZE_SPECIAL_CHARS);

    // Additional Information
    $hosted_project = filter_input(INPUT_POST, 'hosted_project', FILTER_SANITIZE_SPECIAL_CHARS);
    // $has_portfolio = filter_input(INPUT_POST, 'has_portfolio', FILTER_SANITIZE_SPECIAL_CHARS);
    $worked_with_dev_team = filter_input(INPUT_POST, 'worked_with_dev_team', FILTER_SANITIZE_SPECIAL_CHARS);
    $dev_methodologies_experience = filter_input(INPUT_POST, 'dev_methodologies_experience', FILTER_SANITIZE_SPECIAL_CHARS);
    

    //insertion in a bd
    if($choix_niveau == "L1"){
        $insertion = $connexion -> prepare("INSERT INTO `suivie`(`name`, `prenom`, `phone_number`, `email`, `experience_L1`, `experience_L1_details`, `web_dev_skills`, `c_skills`, `mobile_dev_skills`, `hackaton_participation`, `hosted_project`, `it_is_a`, `worked_with_dev_team`,`database_knowledge`, `it_jobs_or_internships`, `comfortable_with_remote_work`, `used_ide`, `dev_methodologies_experience`, `managed_website_or_blog`, `choix_timetable`) 
    VALUES ('$name','$phone_number','$prenom','$email','$experience_L1','$experience_L1_details','','','','','$hosted_project','$it_is_a','$worked_with_dev_team','$database_knowledge','$it_jobs_or_internships','$comfortable_with_remote_work','$used_ide','$dev_methodologies_experience','$managed_website_or_blog','$choix_timetable')");
    $insertion->execute();
    }else{
        $insertion = "INSERT INTO `suivie`(`name`, `prenom`, `phone_number`, `email`, `experience_L1`, `experience_L1_details`, `web_dev_skills`, `c_skills`, `mobile_dev_skills`, `hackaton_participation`, `hosted_project`, `it_is_a`, `worked_with_dev_team`,`database_knowledge`, `it_jobs_or_internships`, `comfortable_with_remote_work`, `used_ide`, `dev_methodologies_experience`, `managed_website_or_blog`, `choix_timetable`) 
    VALUES ('$name','$phone_number','$prenom','$email','','','$web_dev_skills','$c_skills','$mobile_dev_skills','$hackathon_participation','$hosted_project','$it_is_a','$worked_with_dev_team','$database_knowledge','$it_jobs_or_internships','$comfortable_with_remote_work','$used_ide','$dev_methodologies_experience','$managed_website_or_blog','$choix_timetable')";
    $insertion->execute();
    }
    
    $data = $connexion -> prepare("SELECT * FROM suivie");
    $data->execute();
    $data = $data->fetchAll();

    // Echo the data (For demonstration purposes)
    echo "<div class='container text-muted'>";
    echo "<div class='alert alert-success' role='alert'>Enregistrement reusie</div> <br>";
    echo "<b>Received the following data: </b><br>";
    echo "Name: ".$data[0]["name"]."<br>";
    echo "Prenom: ".$data[0]["prenom"]."<br>";
    echo "Phone Number: ".$data[0]["phone_number"]."<br>";
    echo "Email: ".$data[0]["email"]."<br>";
    echo "Experience L1: ".$data[0]["experience_L1"]."<br>";
    echo "Experience L1 Details: ".$data[0]["experience_L1_details"]."<br>";
    echo "Web Dev Skills: ".$data[0]["web_dev_skills"]."<br>";
    echo "C Skills: ".$data[0]["c_skills"]."<br>";
    echo "Mobile Dev Skills: ".$data[0]["mobile_dev_skills"]."<br>";
    echo "Hackathon Participation: ".$data[0]["hackaton_participation"]."<br>";
    echo "Hosted Project: ".$data[0]["hosted_project"]."<br>";
    // echo "Has Portfolio: $has_portfolio<br>";
    echo "IT is a: ".$data[0]["it_is_a"]."<br>";
    echo "Worked with Dev Team: ".$data[0]["worked_with_dev_team"]."<br>";
    echo "Database Knowledge: ".$data[0]["database_knowledge"]."<br>";
    echo "IT Jobs or Internships: ".$data[0]["it_jobs_or_internships"]."<br>";
    echo "Comfortable with Remote Work: ".$data[0]["comfortable_with_remote_work"]."<br>";
    echo "Used IDE: ".$data[0]["used_ide"]."<br>";
    echo "Dev Methodologies Experience: ".$data[0]["dev_methodologies_experience"]."<br>";
    echo "Managed Website or Blog: ".$data[0]["managed_website_or_blog"]."<br>";
    echo "Choice of Timetable : ".$data[0]["choix_timetable"]."<br>";
    echo "</div>";
} else {
    echo "Invalid request.";
}
?>