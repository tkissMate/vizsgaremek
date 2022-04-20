function kosarba(termek_id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        kosarTable.innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/kosarba.php?termek_id=" + termek_id, true);
    xhttp.send();
}

function kosarbol(termek_id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        kosarTable.innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/kosarbol.php?termek_id=" + termek_id, true);
    xhttp.send();
}


let foglalat_string = "foglalat=%";
let forma_string = "forma=%";
let teljesitmeny_string = "teljesitmeny=%";

function foglalat(ertek) {
    foglalat_string = "foglalat=" + ertek;
    keres();
}

function forma(ertek) {
    forma_string = "forma=" + ertek;
    keres();
}

function teljesitmeny(ertek) {
    teljesitmeny_string = "teljesitmeny=" + ertek;
    keres();
}

function keres() {
    const xhttp_keres = new XMLHttpRequest();
    xhttp_keres.onload = function() {
        products_table.innerHTML = this.responseText;
    }
    xhttp_keres.open("POST", "includes/keres.php");
    xhttp_keres.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp_keres.send(foglalat_string + "&" + forma_string + "&" + teljesitmeny_string);
}


function reset() {
    var ele = document.getElementsByName("foglalat_radio");
    for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;
    ele = document.getElementsByName("forma_radio");
    for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;
    ele = document.getElementsByName("teljesitmeny_radio");
    for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;

    foglalat_string = "foglalat=%";
    forma_string = "forma=%";
    teljesitmeny_string = "teljesitmeny=%";
    keres();
}

function account_fiok() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".content").innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/acc.fiok.php", true);
    xhttp.send();
}

function account_rendelesek() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".content").innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/acc.rendelesek.php", true);
    xhttp.send();
}

function listaz(x) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".content").innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/acc.rendelesek.tetel.php?id=" + x, true);
    xhttp.send();
}

function account_jelszo() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".content").innerHTML = this.responseText;
    }
    xhttp.open("GET", "includes/acc.jelszo.php", true);
    xhttp.send();
}