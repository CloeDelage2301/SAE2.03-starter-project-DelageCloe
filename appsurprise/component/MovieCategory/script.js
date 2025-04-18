import { Movie } from "../Movie/script.js";

let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory = {};

MovieCategory.format = function (category) {
  let categoryHtml = template;

  // Remplace le nom de la catégorie
  categoryHtml = categoryHtml.replace("{{idname}}", category.name);

  // Génère un ID unique pour le carousel
  const uniqueId = `carousel-${category.name.replace(/\s+/g, "-").toLowerCase()}`;
  categoryHtml = categoryHtml.replaceAll("{{id}}", uniqueId);

  // Génère le HTML pour les films
  let moviesListHtml = Movie.format(category.movies || []);
  categoryHtml = categoryHtml.replace("{{movieCard}}", moviesListHtml);

  return categoryHtml;
};


export { MovieCategory };