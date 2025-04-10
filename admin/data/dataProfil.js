let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe";


let DataProfil = {};


DataProfil.addProfil = async function (formData) {
        
    let config = {
         method: "POST",
         body: formData
     };
     let response = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config)
     return await response.json();
    
 };

export {DataProfil};