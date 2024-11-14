<?php
require_once('RESTClient.php');
// Récupération de l'ID passé en paramètre GET dans l'URL
$idPerson = isset($_GET['id']) ? $_GET['id'] : null;

//en cas de l'existence d'un ID
if ($idPerson !== null )
{
// Récupération de l'objet 'Personne' ayant l'ID reçu en paramètre
$dataGetById = $client->get($idPerson."/get");
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles valeurs du formulaire
    $personUpdated = [
        "id" => (int)$_POST['id'],
        "nom" => $_POST['nom'],
        "age" => (int)$_POST['age']
    ];

    // Mettre à jour les informations de la personne à travers l'API REST
     $responsePut = $client->put("update", $personUpdated);

      
    // redirection vers une page de liste
    header("Location: list.php");      
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer Personne</title>
    <link rel="stylesheet" type="text/css"
	href="css/style.css" />
        
    
</head>
<body>
<!-- inclure la barre de navigation -->
<?php include 'navBar.html'; ?>
<!-- Contenu principal -->
<div class="content">
    
 <form method="post" action="edit.php">
    <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($dataGetById['id']); ?>" ><br><br>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($dataGetById['nom']); ?>" required><br><br>

    <label for="age">Âge :</label>
    <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($dataGetById['age']); ?>" required><br><br>

    <input type="submit" value="Modifier">
</form>
</div>

</body>
</html>
