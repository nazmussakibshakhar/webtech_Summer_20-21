function isValid(){
    var curpass = document.forms['LForm']['curpass'].value;
    var newpass = document.forms['LForm']['newpass'].value;
    if(curpass === ""){
    document.getElementById('Uerror').innerHTML = "curpass empty";
    
    }
    
    if(newpass === ""){
    document.getElementById('Perror').innerHTML = "newpass empty";
    return false;
    }
    else{
        return true;
    }
    
    }