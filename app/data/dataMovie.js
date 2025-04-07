// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe"; //"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};


DataMovie.requestMovies = async function () {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies" );
  let movies = await answer.json();
 
  return movies;
};

DataMovie.requestMovieDetails = async function(id){
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readMoviedetails&id=" + id );
  let detail = await answer.json();
  return detail;
}

export {DataMovie};



