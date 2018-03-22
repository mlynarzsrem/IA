var tab = document.getElementsByTagName("tr");
alterRows(1,tab[0])
function isEmpty(str) {
    if(str.length==0)
        return true
    else
        return false
}

function validate(formularz) {
    var fields = new Array()
    var nameVal = formularz.elements["f_imie"]
    checkStringAndFocus(nameVal,"Pole 'Imię' nie może być puste!")
    fields['Nazwisko'] = formularz.elements["f_nazwisko"].value
    fields['Miasto'] = formularz.elements["f_miasto"].value
    zipCode= formularz.elements["f_kod"].value
    fields['Ulica/Osiedle'] = formularz.elements["f_ulica"].value
    var state =true
    state = checkZIPCodeRegEx(zipCode)
    for(x in fields){
        if(checkString(fields[x],"Pole '"+x+"' nie może być puste!")==false)
            state = false;
            break;
    }
    var email = formularz.elements["f_email"].value
    if(checkEmailRegEx(email) ==false)
        state= false;
    if(state==false){
        for(x in formularz.elements){
            formularz.elements[x].className ='wrong';
        }
    }
    return state;
}

function isWhiteSpace(str) { 
    var ws = "\t\n\r "; 
    for (var i = 0; i < str.length; i++) { 
        var c = str.charAt(i); 
        if (ws.indexOf(c) == -1) { 
            return false; 
        } 
    } 
    return true; 
}
function checkString(str,message){
    if (isEmpty(str) ||isWhiteSpace(str) ) {
        alert(message);
        return false;
    }
    return true;
}

function checkEmail(str) { 
    if (isWhiteSpace(str)) { 
        alert("Podaj właściwy e-mail"); 
        return false; 
        } 
        else { 
            var at = str.indexOf("@"); 
            if (at < 1) { 
                alert("Nieprawidłowy e-mail"); 
                return false; 
            } 
            else { 
                var l = -1; 
                for (var i = 0; i < str.length; i++) { 
                var c = str.charAt(i); 
                if (c == ".") { 
                l = i; 
                } 
            } 
            if ((l < (at + 2)) || (l == str.length - 1)) { 
            alert("Nieprawidłowy e-mail"); 
            return false; 
            }
        } 
        return true; 
    } 
}
function checkStringAndFocus(obj, msg) { 
    var str = obj.value; 
    var errorFieldName = "e_" + obj.name.substr(2, obj.name.length); 
    if (isWhiteSpace(str) || isEmpty(str)) {
        startTimer(errorFieldName);
        document.getElementById(errorFieldName).innerHTML = msg; 
        obj.focus(); 
        return false; 
    } 
    else { 
        return true; 
    } 
}

var errorField = ""; 
function startTimer(fName) { 
    errorField = fName; 
    window.setTimeout("clearError(errorField)", 5000); 
} 
function clearError(objName) { 
    document.getElementById(objName).innerHTML = ""; 
}

function showElement(e) { 
    document.getElementById(e).style.visibility = 'visible'; 
} 
function hideElement(e) { 
    document.getElementById(e).style.visibility = 'hidden'; 
}

function checkEmailRegEx(str) { 
    var email = /[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+/; 
    if (email.test(str)) 
        return true; 
    else { 
        alert("Podaj właściwy e-mail"); 
        return false; 
    } 
}

function checkZIPCodeRegEx(str){
    var postCode=/\d{2}-\d{3}/;
    var info = document.getElementById("kod")
    if(postCode.test(str)){
        info.innerHTML="Ok"
        info.className = "green"
    }
    else{
        info.innerHTML="Źle"
        info.className = "red"
    }
}
function alterRows(i, e) { 
    if (e) { 
        if (i % 2 == 1) { 
            e.setAttribute("style", "background-color: Aqua;"); 
        } 
        e = e.nextSibling; 
        while (e && e.nodeType != 1) { 
            e = e.nextSibling; 
        } 
        alterRows(++i, e); 
    } 
}
function nextNode(e) { 
    while (e && e.nodeType != 1) { 
        e = e.nextSibling; 
    } 
    return e; 
} 
   
function prevNode(e) { 
    while (e && e.nodeType != 1) { 
        e = e.previousSibling; 
    } 
    return e; 
} 
function swapRows(b) { 
    var tab = prevNode(b.previousSibling); 
    var tBody = nextNode(tab.firstChild); 
    var lastNode = prevNode(tBody.lastChild); 
    tBody.removeChild(lastNode); 
    var firstNode = nextNode(tBody.firstChild); 
    tBody.insertBefore(lastNode, firstNode); 
}
function cnt(form, msg, maxSize) {
 if (form.value.length > maxSize)
 form.value = form.value.substring(0, maxSize);
 else
 msg.innerHTML = maxSize - form.value.length;
}

