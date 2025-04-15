let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe";

// Itération 5
let DataProfil = {};


DataProfil.addProfil = async function (formData) {
        
    let config = {
         method: "POST",
         body: formData
     };
     let response = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config)
     return await response.json();
    
 };

// Itération 8
 DataProfil.update = async function (fdata) {
  let config = {
    method: "POST", 
    body: fdata, 
  };
  let answer = await fetch(
    HOST_URL + "/server/script.php?todo=updateProfile",
    config
  );
  let data = await answer.json();
  return data;
};
  
// Itération 6
  DataProfil.readProfil = async function () {
    let answer = await fetch(
      HOST_URL + "/server/script.php?todo=readProfil"
    );
    let data = await answer.json();
    return data;
  };
  export { DataProfil};