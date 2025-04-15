let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

// Itération 6
NavBar.format = function (hAbout, handlerProfil, profils) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{handler}}", handlerProfil);

  let profil = "";
  for (let i = 0; i < profils.length; i++) {
    let p = profils[i];
    profil += `<option label= "${p.name}" value= "${p.id}" kdata-img="${p.image}" data-dob="${p.age}">${p.nom}</option>`;
  }

  let avatar = profils[0]?.image || "";
  html = html.replace("{{profil}}", profil);
  html = html.replace("{{image}}", image);
  return html;
};

export { NavBar };
