let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe/";
let DataProfil = {};

DataProfil.requestProfil = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil" );
    let profil = await answer.json();
    return profil;
}



DataProfil.readOne = async function (id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil&id=" + id);
    
    let res = await answer.json();
    return res;
  };

  export { DataProfil };