<?php

if (empty($_POST['titre']) 
    || empty($_POST['artiste']) 
    || empty($_POST['description'])
    || empty($_POST['image']) 
    || strlen($_POST['description']) < 3 
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
) {
    header('Location: ajouter.php');
} else {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    
    include('bdd.php');
    $bdd = connexion();

    $requête = $bdd->prepare('INSERT INTO oeuvres (titre, artiste, description, image) VALUES (?, ?, ?, ?)');
    $requête->execute([$titre, $artiste, $description, $image]);

    header('Location: oeuvre.php?id=' . $bdd->lastInsertId());

}

