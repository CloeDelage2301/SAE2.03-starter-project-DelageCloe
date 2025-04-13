

let templateFile = await fetch('./component/UpdateProfileForm/template.html');
let template = await templateFile.text();


let updateProfileForm = {};

updateProfileForm.format = function(handler, profile) {
    let html= template;
    html = html.replace('{{handler}}', handler);
    html = html.replace('{{hProfile}}', profile);
    return html;
}


export {updateProfileForm};