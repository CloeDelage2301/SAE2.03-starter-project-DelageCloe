<?php

define("HOST", "localhost");
define("DBNAME", "delage130");
define("DBLOGIN", "delage130");
define("DBPWD", "delage130");

function getAllMovies($age){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, image, min_age FROM Movie WHERE min_age <= :age";
    $stmt = $cnx->prepare($sql);
     $stmt->bindParam(':age', $age);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 

    
}
  
    

function addMovie($name, $year, $length, $description, $director, $id_category, $image, $trailer, $min_age) {

        $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
        $sql = "INSERT INTO Movie (name, year, length, description, director, id_category, image, trailer, min_age) 
                VALUES (:name, :year, :length, :description, :director, :id_category, :image, :trailer, :min_age)";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':length', $length);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':director', $director);
        $stmt->bindParam(':id_category', $id_category);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':trailer', $trailer);
        $stmt->bindParam(':min_age', $min_age);
        $stmt->execute();

        return $stmt->rowCount();
}

function detailMovie($id) {
        $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
        $sql = "SELECT Movie.id, Movie.name, image, description, director, year, length, Category.name AS category, min_age, trailer 
                FROM Movie 
                INNER JOIN Category ON Movie.id_category = Category.id 
                WHERE Movie.id = :id";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);
        return $res; 
    }



    function getMoviesCategory($age) {
        $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    
        $sql = "SELECT 
                    Category.id AS category_id, 
                    Category.name AS category_name, 
                    Movie.id AS movie_id,
                    Movie.name AS movie_name, 
                    Movie.image AS movie_image
                FROM Movie
             INNER JOIN Category ON Movie.id_category = Category.id
            WHERE Movie.min_age <= :age";
    
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    
        $category = [];
        $rowCount = count($rows);
        for ($i = 0; $i < $rowCount; $i++) {
            $row = $rows[$i];
            if (!isset($category[$row->category_id])) {
                $category[$row->category_id] = [
                    "name" => $row->category_name,
                    "movies" => []
                ];
            }
            $category[$row->category_id]["movies"][] = [
                "id" => $row->movie_id,
                "name" => $row->movie_name,
                "image" => $row->movie_image
                
            ];
        }
    
        return array_values($category); 
    }
    function addProfil($nom, $avatar, $age) {
       
        $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
        $sql = "INSERT INTO Profil (nom, avatar, age) 
                VALUES (:nom, :avatar, :age)";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':age', $age);

        $stmt->execute();

        $res = $stmt->rowCount();
        return $res;
}

function getAllProfil(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "select id, nom, avatar, age from Profil";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 
}



function updateProfile($nom, $avatar, $age, $id) {
 
    
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    
    $sql = "UPDATE Profil 
            SET nom = :nom, avatar = :avatar, age = :age 
            WHERE id = :id";
    
    $stmt = $cnx->prepare($sql);
   
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $res = $stmt->rowCount(); 
    return $res; 
}