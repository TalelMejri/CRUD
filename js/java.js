
     function verif(){
         var nom=f.nom.value;
         var pass=f.pass.value;
         var email=f.email.value;
          if(nom=="" ){
               alert("Nom is required");
               return false;
          }
          else if(email=="" ){
                alert("Email is required");
                return false;
            }
            else if(email.indexOf("@")==-1){
                alert("email invalid");
                return false;
            }
           else if(pass==""){
                alert("Password is required");
                return false;
            }
            else if(pass.length<=4){
                alert("password easy");
                return false;
            }
          }
     var mess=document.getElementById("message");
     var pass=document.querySelector("#pass");
     var str=document.getElementById("str");
       pass.addEventListener("input",()=>{
           if(pass.value.length>0){
               mess.style.display="block";
           }
           else{
               mess.style.display="none";
           }
           if(pass.value.length<4){
               str.innerHTML="weak";
               mess.style.color="red";
               pass.style.borderBottomColor="red";
           }
           else if
           ((pass.value.length>4) &&( pass.value.length<8)){
                str.innerHTML="medium";
                pass.style.borderColor="yellow";
                mess.style.color="yellow";
            }
            else if( pass.value.length>8){
                str.innerHTML="strong";
                pass.style.borderColor="green";
                mess.style.color="green";
            } 
    })
   /*  var annuler=document.querySelector("#annuler");
     var admin=document.querySelector("#admin");
      annuler.addEventListener("click",()=>{
          admin.style.display="none";
      })
      var view=document.querySelector(".view");
      view.addEventListener("click",()=>{
          admin.style.display="block";
      })*/

       

