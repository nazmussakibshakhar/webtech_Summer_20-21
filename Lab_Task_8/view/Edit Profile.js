function isValid(){
    var name = document.forms['LForm']['name'].value;
    var usname = document.forms['LForm']['usname'].value;
    var email = document.forms['LForm']['email'].value;
    var gender = document.forms['LForm']['gender'].value;
    if(name === ""){
    document.getElementById('name').innerHTML = "name empty";
    
    }
    if(usname === ""){
    document.getElementById('uname').innerHTML = "usname empty";
    
    }
    if(email === ""){
    document.getElementById('email').innerHTML = "email empty";
    
    }

    if(gender === ""){
    document.getElementById('gender').innerHTML = "gender empty";
    return false;
    }
    else{
        return true;
    }
    
    }