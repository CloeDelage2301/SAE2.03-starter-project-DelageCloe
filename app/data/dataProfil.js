let HOST_URL = "..";
let DataProfil = {};


// Itération 5
DataProfil.requestProfil = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil" );
    let profil = await answer.json();
    return profil;
}


// Itération 6
DataProfil.readOne = async function (id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil&id=" + id);
    
    let res = await answer.json();
    return res;
  };

  export { DataProfil };