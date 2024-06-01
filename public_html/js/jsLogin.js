function viewAccessDenied(){
    let formDiv = document.querySelector('#log'); 
    //console.log(formDiv);
    let div = document.createElement('div');
    div.className = "alert1";
    div.style["color"] = "red";
    div.style["display"] = "flex";
    div.style["justify-content"]=  "center";
    // div.style["padding-top"] = "1em";
    div.innerHTML = "<strong>Имя и пароль не совпадают</strong>";
    formDiv.appendChild(div);
}

    name1.oninput = function() {
        let formDiv = document.querySelector('.alert1');
        if(formDiv){
            formDiv.style["display"] = "none"; 
        }
    } 

// viewDiv.addEventListener("change",()=>{
//     div.style["display"] = "none";
// })


