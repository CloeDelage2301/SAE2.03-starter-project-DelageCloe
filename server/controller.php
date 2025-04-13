<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function readMoviesController(){
    $movies = getAllMovies(); 
    return $movies;
}

function addController() {
    header('Content-Type: application/json');

    $name = $_REQUEST['name'];
    $year = $_REQUEST['year'];
    $length = $_REQUEST['length'];
    $description = $_REQUEST['description'];
    $director = $_REQUEST['director'];
    $id_category = $_REQUEST['id_category'];
    $image = $_REQUEST['image'];
    $trailer = $_REQUEST['trailer'];
    $min_age = $_REQUEST['min_age'];

    $ok = addMovie($name, $year, $length, $description, $director, $id_category, $image, $trailer, $min_age);

    echo json_encode([
        "success" => $ok != 0,
        "message" => $ok != 0 ? "Film ajouté à la base de donnée" : "Erreur lors de l'ajout du film"
    ]);

    exit();
}
function detailController() {

    $id = $_REQUEST['id'];
    $movie = detailMovie($id);
    return $movie;
    exit();
}



function profilController() {
    
    // Vérifiez que les paramètres sont définis
    if (!isset($_REQUEST['nom']) || !isset($_REQUEST['avatar']) || !isset($_REQUEST['age'])) {
        echo json_encode(["success" => false, "message" => "Paramètres manquants"]);
        exit();
    }
    
    $nom = $_REQUEST['nom'];
    $avatar = $_REQUEST['avatar'];
    $age = $_REQUEST['age'];
    
    // Vérifiez que l'âge est un entier valide
    if ( $age <= 0) {
        echo json_encode(["success" => false, "message" => "Âge invalide"]);
        exit();
    }
    
    $ok = addProfil($nom, $avatar, $age);
    
    if ($ok != 0) {
        echo json_encode(["success" => true, "message" => "Profil ajouté à la base de donnée"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du Profil"]);
    }
    
    exit();
}
function readMovieCategory() {
    $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : 0; 
    $category = getMoviesCategory($age);
    return $category ? $category : false;
  }

  function readProfilController() {
    $profil = getAllProfil();
    return $profil;
  }

  function updateProfileController() {
    $id = $_REQUEST['id'] ?? null;
    $nom = $_REQUEST['nom'] ?? null;
    $avatar = $_REQUEST['avatar'] ?? null;
    $age = $_REQUEST['age'] ?? null;

    if (empty($id) || empty($nom) || empty($age)) {
        return "Erreur : Tous les champs obligatoires doivent être remplis.";
    }

    $ok = updateProfile($id, $nom, $avatar, $age);
    return $ok ? "Le profil a été modifié avec succès." : "Erreur lors de la modification du profil.";
}
