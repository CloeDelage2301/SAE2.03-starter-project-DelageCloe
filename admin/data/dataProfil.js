let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-starter-project-DelageCloe";

let DataProfiladd = {};

DataProfiladd.addProfil= async function (fdata) {
  
    let config = {
        method: "POST", 
        body: fdata 
    };

    let answer = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config);
    let data = await answer.json(); 
    return data; 
}

export {DataProfiladd};

