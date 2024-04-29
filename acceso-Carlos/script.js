function searchUsers(value) {
    var searchTerm = document.getElementById("searchBar").value;
    var usuarioIDElement = document.getElementById("usuarioID");
    var usuarioID = usuarioIDElement ? usuarioIDElement.value : '';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("searchResultado").innerHTML = this.responseText;
        }
    };
    // Verifica si usuarioID tiene un valor antes de incluirlo en la URL
    var url = "php/"+value+"?term=" + searchTerm;
    if (usuarioID) 
    {
        url += "&usuarioID=" + usuarioID;
    }
    
    xhttp.open("GET", url, true);
    xhttp.send();
    return false;
}