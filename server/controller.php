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

//Itération 1
function readMoviesController(){
    $movies = getAllMovies(); 
    return $movies;
}

//Itération 2
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

//Itération 3
function detailController() {

    $id = $_REQUEST['id'];
    $movie = detailMovie($id);
    return $movie;
    exit();
}

//Itération 4
function readMovieCategory() {
    $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : 0; 
    $category = getMoviesCategory($age);
    return $category ? $category : false;
  }


//Itération 5
function profilController() {
    
    if (!isset($_REQUEST['name']) || !isset($_REQUEST['image']) || !isset($_REQUEST['age'])) {
        echo json_encode(["success" => false, "message" => "Paramètres manquants"]);
        exit();
    }
    
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $age = $_REQUEST['age'];
        if ( $age <= 0) {
        echo json_encode(["success" => false, "message" => "Âge invalide"]);
        exit();
    }
    
    $ok = addProfil($name, $image, $age);
    
    if ($ok != 0) {
        echo json_encode(["success" => true, "message" => "Profil ajouté à la base de donnée"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du Profil"]);
    }
    
    exit();
}

//Itération 6 / 7
  function readProfilController() {
    $profil = getAllProfil();
    return $profil;
  }

//Itération 8
  function updateProfileController() {
      $id = $_REQUEST['id'] ?? null;
      $name = $_REQUEST['name'] ?? null;
      $image = $_REQUEST['image'] ?? null;
      $age = $_REQUEST['age'] ?? null;
  
    if (empty($id) || empty($name) || empty($image) || empty($age)) {
        return "Veuillez remplir tout les champs.";
    }
    $ok = updateProfile($id, $name, $image, $age);
    return $ok ? "Le profil a été modifié avec succès." : "Erreur lors de la modification du profil.";

  }


//Itération 9
  function addFavorisController() {
    $id_profil = $_REQUEST['id_profil'] ?? null;
    $id_movie = $_REQUEST['id_movie'] ?? null;

    if (isFavoris($id_movie, $id_profil)) {
        return ["error" => "Ce film est déjà dans les favoris."];
    }

    $result = addFavoris($id_movie, $id_profil);
    if ($result) {
        return ["success" => "Film ajouté aux favoris."];
    } else {
        return ["error" => "Impossible d'ajouter le film aux favoris."];
    }
}

function readFavorisController() {
  $id_profil = $_REQUEST['id_profil'] ?? null;
  $favoris = getFavoris($id_profil);
  return $favoris ? $favoris : [];
}


//Itération 10
function removeFavorisController() {
  $id_profil = $_REQUEST['id_profil'] ?? null;
  $id_movie = $_REQUEST['id_movie'] ?? null;
  $result = removeFavoris($id_movie, $id_profil);
  if ($result) {
      return ["success" => "Film supprimé des favoris."];
  } else {
      return ["error" => "Impossible de supprimer le film des favoris."];
  }
}