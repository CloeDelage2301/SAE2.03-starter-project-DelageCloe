let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe"; //"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

// Itération 1
DataMovie.requestMovies = async function (age = 99) {
  let answer = await fetch(HOST_URL + `/server/script.php?todo=readMovieCategory&age=${age}`);
  let movies = await answer.json();
 
  return movies;
};

// Itération 3
DataMovie.requestMovieDetails = async function(id){
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readMoviedetails&id=" + id );
  let detail = await answer.json();
  return detail;
}

// Itération 4
DataMovie.requestMovieCategory = async function () {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readMovieCategory");
  let categories = await answer.json();
  return categories;
};

// Itération 9
DataMovie.addFavoris = async function (id_profil, id_movie) {
  let answer = await fetch(
    HOST_URL + "/server/script.php?todo=addFavoris&id_profil=" + id_profil + "&id_movie=" + id_movie
  );

  let data = await answer.json();
  return data;
};

// Itération 10
DataMovie.removeFavoris = async function (id_profil, id_movie) {
  let answer = await fetch(
    HOST_URL + "/server/script.php?todo=removeFavoris&id_profil=" + id_profil + "&id_movie=" + id_movie
  );

  let data = await answer.json();
  return data;
};

export {DataMovie};