function isEmpty(str) {
    if(str.length==0)
        return true
    else
        return false
}

function validate(formularz) {
    var nameVal = formularz.elements["f_imie"].value
    if (isEmpty(nameVal)) {
        alert("To pole nie mo¿e byæ puste");
    }
}