<?php
require_once('RESTClient.php');
// Récupération de l'ID passé en paramètre GET dans l'URL
$idPerson = isset($_GET['id']) ? $_GET['id'] : null;

//en cas de l'existence d'un id 
if ($idPerson !== null )
{
// suppression de l'objet 'Personne' ayant l'id reçu en paramètre
$dataGetById = $client->delete($idPerson."/delete");
}
  
    // redirection vers une page de liste
    header("Location: list.php");      
    exit();

?>