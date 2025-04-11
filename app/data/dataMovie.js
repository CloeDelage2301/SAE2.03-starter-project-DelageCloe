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
export {DataMovie};

// DataMovie.requestMovieProfil = async function(age){
//     let answer = await fetch(HOST_URL + "/server/script.php?todo=movieProfil&id=" + age );
//     let profil = await answer.json();
//     return profil;
// }
// export {DataMovie};



