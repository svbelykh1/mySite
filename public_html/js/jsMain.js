menu.onclick = function myFunction(){
    var x = document.getElementById("myTopNav");
    if(x.className === "topnav"){
        x.className += " responsive"
    }else{
        x.className = "topnav"
    }    
}

