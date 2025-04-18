Un fichier README.md qui explique, pour chaque itération:

- Les modifications apportées sur la base de données avec les justification de votre choix concernant les tables, le associations, les types de données, clefs primaires, etc...
- Les cardinalités sur Looping et les requêtes SQL que vous avez utilisées dans votre code PHP.
- Une capture d’écran de la vue Looping


"Itération 1 : Consulter la liste des films proposés par la plateforme."

Pas modifications sur la base de donnée. 
Uniquement l'importation de la base donnée contenant 2 tables donné par les professeur: Movie et la Category.
La table Movie contient une clé primaire id et d'autres paramètre comme l'année, le réalisateur,l'âge minimum, etc...
La table Category contient une clé primaire id de la catégorie ainsi qu'un paramètre name.

Voici ma requete sql : 

SELECT Movie.id, Movie.name, Movie.image, Movie.min_age, Category.name AS category_name 
            FROM Movie 
            INNER JOIN Category ON Movie.id_category = Category.id


"Itération 2 : Ajouter des films dans la base de données."

Pas modifications sur la base de données.
Uniquement des ajouts de films avec les paramètres qui étaient déjà présents.

Voici ma requete sql : 

INSERT INTO Movie (name, year, length, description, director, id_category, image, trailer, min_age) 
                VALUES (:name, :year, :length, :description, :director, :id_category, :image, :trailer, :min_age)

Itération 3 : Consulter les informations détaillées d'un film ainsi que son trailer.

Pas modifications sur la base de données.

Voici ma requete sql : 

SELECT Movie.id, Movie.name, image, description, director, year, length, Category.name AS category, min_age, trailer 
                FROM Movie 
                INNER JOIN Category ON Movie.id_category = Category.id 
                WHERE Movie.id = :id";

                
Itération 4 : Afficher les films en les regroupant par catégorie.

Pas modifications sur la base de données.
J'ai utilisé le paramètre id_category dans la table Movie qui est une clé étrangère la reliant avec l'id de la table Category ce qui a permis de regrouper les films par catégories.

Voici ma requete sql : 

SELECT
                 Category.id AS category_id, 
                 Category.name AS category_name, 
                 Movie.id AS movie_id,
                 Movie.name AS movie_name, 
                 Movie.image AS movie_image
                FROM Movie
             INNER JOIN Category ON Movie.id_category = Category.id
            WHERE Movie.min_age <= :age";

Itération 5 : Avoir un formulaire pour ajouter des profils utilisateurs.

Ajout d'une table Profil ayant pour paramètres le nom du profil, l'avatar soit l'image du profil et l'âge correspondant a celui-ci ainsi qu'une clé primaire id.


Voici ma requete sql : 

INSERT INTO Profil (name, image, age) 
                VALUES (:name, :image, :age)";

Itération 6 : Pouvoir choisir un profil utilisateur.

Pas modifications sur la base de données.

Voici mes requetes sql : 

SELECT id, name, image, age from Profil

Itération 7 : Filtrer les contenus selon l'age du profil sélectionné.

Pas modifications sur la base de données.
Permet de faire apparaitre certains films en fonctions de l'âge du profil.


Itération 8 : Pouvoir modifier un profil utilisateur.

Pas modifications sur la base de données.


Looping : 

J'ai relié les tables category et Movie par le verbe Catégoriser car : 
- Une categories peut catégoriser de 0 à n films.
- Un film peut etre catégorisé par une seule catégorie.

J'ai les tables Movie et Profils par le verbe Filtrer car  : 
- Un film peut etre filtrer celon l'age par 0 à n profils.
- Un profil celon son age peut accéder à 0 à n films.