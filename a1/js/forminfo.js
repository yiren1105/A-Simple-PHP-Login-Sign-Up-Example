function signUpValidation() {
    if(!validateFirstName(document.getElementById("firstName")))
    {
        // document.getElementById("sfirstName").innerText = "First name is invalid.";
        prompt("First name is invalid.");
        return false;
    }



    // if(!validateLastName(document.getElementById("lastName")))
    //     alert("last name is invalid.");
    // return false;
    //
    // if(!validateAddress(document.getElementById("streetAddress")))
    //     alert("Street address is invalid.");
    // return false;
    //
    // if(!validatePostalCode(document.getElementById("postalCode")))
    //     alert("Postal code is invalid.");
    // return false;
    //
    // if(!validatePassword(document.getElementById("password")))
    //     alert("Password is invalid.");
    // return false;
    //
    // if(!confirmPassword(document.getElementById("password"), document.getElementById("confirmPassword")))
    //     alert("Password is invalid.");
    // return false;

    //return true;

}

function validatePostalCode(postalCode) {
    //document.getElementById("validatePost").innerText = null;
    var regex= /^\s*([ABCEGHJ-NPRSTVXY][0-9][ABCEGHJ-NPRSTV-Z])\s*([0-9][ABCEGHJ-NPRSTV-Z][0-9])\s*$/i;
    //var post = document.getElementById("postalCode");
    if (regex.test(postalCode))
        return true;
    else
        return false;
    // if (regex.test(post.value))
    // {
    //     //alert('valid');
    //
    //     post.value =  post.value.substring(0,3) + " " + post.value.substring(3,6);
    // }
    // else {
    //     document.getElementById("validatePost").innerText = "Invalid Postal Code";
    //     post.value = null;
    // }

}

function validateFirstName(firstname) {
    var regex = /^[A-Z][a-zA-Z]*/;
    return regex.test(firstname);
}

function validateLastName(lastname) {
    var regex = /^[A-Z]\'?[a-z]+(\s?|\-?)[a-zA-Z]+/;
    return regex.test(lastname);
}

function validatePassword(password) {
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
    return regex.test(password);
}

function confirmPassword(pwd, confirmPwd) {
    if (pwd == confirmPwd )
        return true;
    else
        return false;
}

function validateAddress(address) {
    var regex = /^\s*\S+(?:\s+\S+){2,}/;
    return regex.test(address);
}

