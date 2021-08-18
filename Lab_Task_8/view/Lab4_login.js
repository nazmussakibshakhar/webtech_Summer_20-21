function isValid(){
    var UserName = document.forms['LForm']['username'].value;
    var Password = document.forms['LForm']['password'].value;
    if(UserName === ""){
    document.getElementById('Uerror').innerHTML = "UserName empty";
    
    }
    
    if(Password === ""){
    document.getElementById('Perror').innerHTML = "Password empty";
    return false;
    }
    else{
        return true;
    }
    
    }