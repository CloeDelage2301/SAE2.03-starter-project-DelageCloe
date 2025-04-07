let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};

MovieDetail.format = function (movie) {
  let movieHtml = template;
  
  movieHtml = movieHtml.replace("{{name}}", movie.name);
  movieHtml = movieHtml.replace("{{year}}", movie.year);
  movieHtml = movieHtml.replace("{{length}}", movie.length);
  movieHtml = movieHtml.replace("{{description}}", movie.description);
  movieHtml = movieHtml.replace("{{director}}", movie.director);
  movieHtml = movieHtml.replace("{{image}}", movie.image);
  movieHtml = movieHtml.replace("{{category}}", movie.category);
  movieHtml = movieHtml.replace("{{trailer}}", movie.trailer);
  movieHtml = movieHtml.replace("{{min_age}}", movie.min_age);

  return movieHtml;
};

export { MovieDetail };