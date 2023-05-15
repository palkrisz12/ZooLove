function liveSearch()
{
    const name = document.getElementById("allatKereses").value;
    if(name.length >= 2){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(xhttp.readyState == 4 && xhttp.status == 200){
                const animals = JSON.parse(xhttp.responseText);
                const ul = document.getElementById("foundedAnimals");
                ul.innerHTML="";
                animals.forEach( animal => {
                    const li = document.createElement("li");
                    const link = document.createElement("a"); // új link elem létrehozása
                    let animalSpecies = animal.name;
                    link.innerHTML = animalSpecies; // a link szövege az allathoz
                    link.href = "./AllatOldala.phtml?id=" + animal.id; // a link href attribútuma az allat ID-je alapján
                    li.appendChild(link); // a link elem hozzáadása az ul elemhez
                    ul.appendChild(li);
                })
            }
        }
        const params = new URLSearchParams({"name": name});
        const url = "./LiveSearch.phtml"+"?"+params.toString();
        xhttp.open("GET", url);
        xhttp.send();
    } else {
        const ul = document.getElementById("foundedAnimals");
        ul.innerHTML="";
    }
}


function moveLeft() {
    const urlParams = new URLSearchParams(window.location.search);
    const currentId = parseInt(urlParams.get('id'));
    const newId = currentId - 1;
    if (newId > 0) {
        window.location.href = "./AllatOldala.phtml?id=" + newId;
    }
}

function moveRight(){
    const urlParams = new URLSearchParams(window.location.search);
    const currentId = parseInt(urlParams.get('id'));
    const newId = currentId + 1;
    if (newId > 0) {
        window.location.href = "./AllatOldala.phtml?id=" + newId;
    }
}

