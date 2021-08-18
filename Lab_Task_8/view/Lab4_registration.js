function isValid(){
    var name = document.forms['LForm']['name'].value;
    var email = document.forms['LForm']['email'].value;
    var usname = document.forms['LForm']['usname'].value;
    var pass = document.forms['LForm']['pass'].value;
    var cpass = document.forms['LForm']['cpass'].value;
    var cpass = document.forms['LForm']['gender'].value;
    if(name === ""){
    document.getElementById('name').innerHTML = "name empty";
    
    }
    if(email === ""){
    document.getElementById('email').innerHTML = "email empty";
    
    }
    if(usname === ""){
    document.getElementById('usname').innerHTML = "usname empty";
    
    }
    if(pass === ""){
    document.getElementById('pass').innerHTML = "pass empty";
    
    }
    if(cpass === ""){
    document.getElementById('cpass').innerHTML = "cpass empty";
    
    }
    
    if(gender === ""){
    document.getElementById('gender').innerHTML = "gender empty";
    return false;
    }
    else{
        return true;
    }
    
    }