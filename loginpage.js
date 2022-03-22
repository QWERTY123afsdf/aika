function openCity(tab) {
    var i;
    var x = document.getElementsByClassName("tabcont");
    var y = document.getElementsByClassName("tab")
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        y[i].style.backgroundColor = "#e0a85f";
    }
    document.getElementById(tab).style.display = "block";
    document.getElementById(tab.concat("tab")).style.backgroundColor = "#ffcb86";
}