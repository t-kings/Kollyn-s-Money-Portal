function myFunction1() {
    document.getElementById("cc").classList.toggle("change");
    var x = document.getElementById("kdrpc");

    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}


function kdrp2() {

    var y = document.getElementById("kdrpc2");

    if (y.style.display === "block") {
        y.style.display = "none";
    } else {
        y.style.display = "block";
    }
}

function kdrp1() {
    document.getElementById("kdrpc").style.display = "none";
}

function kdrp12() {
    document.getElementById("kdrpc2").style.display = "none";
}

function kdep() {
    var x = document.forms["kdform"]["fromname"].value;
    var y = document.forms["kdform"]["toname"].value;
    var a = document.forms["kdform"]["amount"].value;
    var b = document.forms["kdform"]["commission"].value;
    var c = document.forms["kdform"]["destination"].value;
    var errors = [];
    document.getElementById("kdeposit").style.display = "block";
    if (x == "") {
        errors.push("*** Sender is required");
    }
    if (y == "") {
        errors.push("*** Recipient is required");
    }
    if (a == "") {
        errors.push("*** Amount is required");
    }
    if (b == "") {
        errors.push("*** Commission is required");
    }

    if (c == "selectdestination") {
        errors.push("*** Select Destination ");
    }
    if (errors.length == 0) {
        document.getElementById("kdeposit").innerHTML =
            "You will be depositing <b style='color:green'>" + a + "</b> from <b style='color:green'>" + x + "</b> to <b style='color:green'>" + y + "</b> at <b style='color:green'>" + c + "</b></br> <a href='JavaScript:void(0)' class='btn btn-success' onclick='kkkdeposit()'> Proceed </a> or <a href='JavaScript:void(0)' class='btn btn-warning' onclick='kkdeposit()'> Cancel </a>";
    } else {
        document.getElementById("kdeposit").innerHTML = "<p style='color:red'>" + errors.join('<br>') + "<br /> <a href='JavaScript:void(0)' class='btn btn-warning' onclick='kkdeposit()'> Back </a> </p>";
    }
}

function kkdeposit() {
    document.getElementById("kdeposit").style.display = "none";
}

function kkkdeposit() {
    var x = document.forms["kdform"]["fromname"].value;
    var y = document.forms["kdform"]["toname"].value;
    var a = document.forms["kdform"]["amount"].value;
    var b = document.forms["kdform"]["commission"].value;
    var c = document.forms["kdform"]["destination"].value;
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("kdeposit").innerHTML = this.responseText;
        }
    }
    hr.open("POST", "kdep.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var vars = "dp=" + x + "&dq=" + y + "&dr=" + a + "&ds=" + b + "&dt=" + c;
    hr.send(vars);
    document.getElementById("kdeposit").innerHTML = "<p style='color:red'> processing</p> <img src='gifspin.gif' style='height: 70px; width: 70px;' />";
}

function kkkupdate() {
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("drppp").innerHTML = this.responseText;
            document.getElementById("mdrppp").innerHTML = this.responseText;
        }
    }
    hr.open("POST", "knot.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hr.send();
}
setInterval(kkkupdate, 3000);

function kidupdate() {
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("kid").innerHTML = this.responseText;
            document.getElementById("mkid").innerHTML = this.responseText;
        }
    }
    hr.open("POST", "kount.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hr.send();
}
setInterval(kidupdate, 3000);

function kkidupdate() {
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {}
    }
    hr.open("POST", "kupdate.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hr.send();
}

function kdrp12() {
    document.getElementById("kdrpc2").style.display = "none";
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {}
    }
    hr.open("POST", "kupdate.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hr.send();
}

function koutt() {
    document.getElementById("kwithdrawal").style.display = "none";
}

function kouttt() {
    window.location.reload();

}

function kret() {
    var x = document.forms["kform"]["username"].value;
    var y = document.forms["kform"]["location"].value;
    var a = document.forms["kform"]["password"].value;
    var b = document.forms["kform"]["confpassword"].value;
    var c = document.forms["kform"]["Regkey"].value;
    var errors = [];
    document.getElementById("ksubmit").style.display = "block";
    if (x == "") {
        errors.push("*** Username is recquired");
    }
    if (y == "selectlocation") {
        errors.push("*** Select Cashier's Location");
    }
    if (a == "") {
        errors.push("*** Please Input Password");
    }
    if (a !== b) {
        errors.push("*** The Two Passwords Does Not Match");
    }

    if (c !== "admin collins") {
        errors.push("*** Wrong Manager's Registration Key ");
    }

    if (errors.length == 0) {
        document.getElementById("ksubmit").innerHTML =
            "You will be creating an admin with the name <b style='color:green'>" + x + "</b> and location <b style='color:green'>" + y + "</b> </br> <a class='btn btn-success' href='JavaScript:void(0)' onclick='kkksubmit()'> Proceed </a> or <a href='JavaScript:void(0)' class='btn btn-success' onclick='kksubmit()'> Cancel </a>";

    } else {
        document.getElementById("ksubmit").innerHTML = "<p style='color:red'>" + errors.join('<br>') + "<br /> <a href='JavaScript:void(0)' class='btn btn-success'   onclick='kksubmit()'> Back </a> </p>";

    }
}

function kksubmit() {
    document.getElementById("ksubmit").style.display = "none";
}

function kkksubmit() {
    var x = document.forms["kform"]["username"].value;
    var y = document.forms["kform"]["location"].value;
    var a = document.forms["kform"]["password"].value;
    var b = document.forms["kform"]["confpassword"].value;
    var c = document.forms["kform"]["Regkey"].value;
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ksubmit").innerHTML = this.responseText;
        }
    }
    hr.open("POST", "kreg.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var vars = "p=" + x + "&q=" + y + "&r=" + a;
    hr.send(vars);
    document.getElementById("ksubmit").innerHTML = "<p style='color:red'> processing </p> <img src='gifspin.gif' style='height: 70px; width: 70px;' />";
}

function searchRecords() {
    var x = document.forms["kcr"]["recdate1"].value;
    var y = document.forms["kcr"]["recdate2"].value;
    var a = document.forms["kcr"]["recagent"].value;
    var b = document.forms["kcr"]["locationsearch"].value;
    var c = document.forms["kcr"]["recdestination"].value;
    var hr = new XMLHttpRequest();
    hr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ksrf").innerHTML = this.responseText;
        }
    }
    hr.open("POST", "ksrf.php", true);
    hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var vars = "p=" + x + "&q=" + y + "&r=" + a + "&s=" + b + "&t=" + c;
    hr.send(vars);
    document.getElementById("ksrf").innerHTML = "<p style='color:red'>processing</p> <img src='gifspin.gif' style='height: 70px; width: 70px;' />";
}