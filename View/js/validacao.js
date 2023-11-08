function validar(){
document.querySelector("#"+btnEnviar).disabled=true;


for(let p=0; p<=ver.length; p++){
    var tam=ver.length-1;
let x=document.querySelector("#"+ver[p].id);
if(!x.checkValidity()){
    document.querySelector("#"+ver[p].idlabel).innerHTML=x.validationMessage;
    document.querySelector("#"+ver[p].idlabel).style.display="block";
    }
    else{
    document.querySelector("#"+ver[p].idlabel).innerHTML="";
    document.querySelector("#"+ver[p].idlabel).style.display="none";
    

    }
    
      
}

 document.querySelector("#"+btnEnviar).disabled=false;

}

function aparecer(){

document.querySelector("#"+lev).style.display="block";

}