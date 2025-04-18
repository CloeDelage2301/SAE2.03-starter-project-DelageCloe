let Footer = {};

Footer.render = async function () {
  let footerElement = document.querySelector("footer");
  if (!footerElement) {
    console.error("Footer element not found in the DOM.");
    return;
  }

  try {
    let templateFile = await fetch("./component/Footer/template.html");
    let template = await templateFile.text();
    footerElement.innerHTML = template;
  } catch (error) {
    console.error("Erreur lors du chargement du footer :", error);
  }
};

export { Footer };
