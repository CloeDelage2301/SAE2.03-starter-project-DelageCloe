let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe/";
let DataProfil = {};

DataProfil.requestProfil = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil" );
    let profil = await answer.json();
    return profil;
}

export {DataProfil};