let HOST_URL = "../server";


let DataProfil = {};


DataProfil.addProfil = async function (formData) {
        
    let config = {
         method: "POST",
         body: formData
     };
     let response = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config)
     return await response.json();
    
 };

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
  
  DataProfil.readProfil = async function () {
    let answer = await fetch(
      HOST_URL + "/server/script.php?todo=readProfil"
    );
    let data = await answer.json();
    return data;
  };
  export { DataProfil};