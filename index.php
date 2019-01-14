<?php
/**
 * Created by PhpStorm.
 * User: romainbon
 * Date: 2019-01-14
 * Time: 10:04
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "colyseum";
$conn = new mysqli($servername, $username, $password);
if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $conn->select_db($dbname);
}

$afficher = "SELECT * FROM clients";
$resulat = $conn->query($afficher);

while ( $donnee = $resulat -> fetch_assoc() ){

    echo $donnee['id'].' - Nom : '.$donnee['lastName'].' / Prénom : '.$donnee['firstName'].' / Date de Naissance '.$donnee['birthDate'].' / Nombre de carte : '.$donnee['card'].' / Numéro de Carte :   '.$donnee['cardNumber'].'<br>';

}

echo '<br><br>';

$affiche = "SELECT * FROM showTypes";
$result = $conn ->query($affiche);
    echo 'Type de Spectacles : ';
while ( $donne = $result -> fetch_assoc()) {
    echo $donne['type'].' - ';
}

echo '<br><br>';

$Afficher = "SELECT * FROM clients LIMIT 0,20";
$resu = $conn ->query($Afficher);

echo 'Voici les 20 premières entrées de la table Clients :'.'<br><br>';

while ( $donnees = $resu ->fetch_assoc()) {

    echo $donnees['id'].' - Nom : '.$donnees['lastName'].' / Prénom : '.$donnees['firstName'].' / Date de Naissance '.$donnees['birthDate'].' / Nombre de carte : '.$donnees['card'].' / Numéro de Carte :   '.$donnees['cardNumber'].'<br>';


}

echo '<br><br>';

$affich = "SELECT * FROM `clients` WHERE `card` = 1";
$res = $conn -> query($affich);

echo 'Voici les clients ayant une carte : '.'<br><br>';

while ( $donn = $res ->fetch_assoc()) {

    echo $donn['id'].' - Nom : '.$donn['lastName'].' / Prénom : '.$donn['firstName'].' / Date de Naissance '.$donn['birthDate'].' / Nombre de carte : '.$donn['card'].' / Numéro de Carte :   '.$donn['cardNumber'].'<br>';


}

echo '<br><br>';

$toto = "SELECT * FROM clients WHERE clients.lastName LIKE 'm%' ORDER BY lastName ASC" ;
$dede = $conn ->query($toto);

echo 'Voici les clients commencent par la lettre M et par ordre alphabétique : '.'<br><br>';

while ( $donn = $dede->fetch_assoc()) {

    echo $donn['id'].' - Nom : '.$donn['lastName'].' / Prénom : '.$donn['firstName'].'<br>';

}

echo '<br><br>';

$a = "SELECT * FROM shows";
$b = $conn ->query($a);

echo 'Type de Spectacle : '.'<br><br>';

while ( $popo = $b -> fetch_assoc() ) {
    echo 'Spectacle : '.$popo['title'].' / Perfomer : '.$popo['performer'].' / Date : '.$popo['date'].'<br>';
}

echo '<br><br>';

echo 'Carte de Fidélité : ';

$d = "SELECT * FROM clients left join cards ON ( cards.cardNumber = clients.cardNumber) WHERE 1";
$e = $conn ->query($d);

while ( $dodo = $e ->fetch_assoc()) {

    if ($dodo['cardTypesId'] == 1){
        $dodo['card']= "Oui";

    }
    else {
        $dodo['card'] = "Non";
        $dodo['cardNumber'] ="";
    }

    echo ' Nom : '.$dodo['lastName'].'<br>'.' Prénom : '.$dodo['firstName'].'<br>'.' Date de Naissance : '.$dodo['birthDate'].'<br>'.'Carte de Fidélité : '.$dodo['card'].'<br>'.'Numéro de Cartes : '.$dodo['cardNumber'].'<br><br>';

}





