function ContactValidate() {
    const submitBTN = document.getElementById('Submit');
    const Phone = document.getElementById('phone').value;
    const MsgBox = document.getElementById('message').value;
    
    var phone = /^[0-9]{11}$/;    

    if (usercheck.test(Phone)) {
        document.getElementById("phonewarn").innerHTML = "";
    }else{
        document.getElementById("phonewarn").innerHTML = "**Phone Number Is Invalid";
        return false
    }

    if (MsgBox !== "") {
        document.getElementById("warningmsg").innerHTML = "";
    }
    else{
        document.getElementById("warningmsg").innerHTML = "**MessageBox Must Be Filled";
        return false;

    }
    
    
}