function getCookie(name) {
    var cookieArr = document.cookie.split(";");
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if(name === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

let liste = getCookie("cart");
if (liste !== null){
    montab = JSON.parse(liste);
}else{
    document.cookie="cart=[]; path=/";
    montab =Array();
}
console.log(montab);
console.log(liste);

document.getElementById('liste').value=JSON.stringify(montab);

var totalgeneral=0
montab.forEach(uneinfo => {

    let html = `
    <div class="flex grid">
        <div class="images-panier">
            <img src="../${(uneinfo.affiche)}" alt="affiche de ${uneinfo.titre}">
        </div>
        <div>
            <p class="margin-panier">Nom du spectacle : ${uneinfo.titre}</p>
            <p class="margin-panier">Salle du spectacle : ${uneinfo.salle}</p>
            <p class="margin-panier">Date du spectacle : ${uneinfo.date}</p>
        </div>
        <div>
            <p id="${uneinfo.id}" class="margin-panier">Nombre de place : <button class="moins">-</button><span>${uneinfo.quantite}</span><button class="plus">+</button></p>
            <p class="margin-panier">Prix unitaire : <span class="unitaire">${uneinfo.prix}</span>€</p>
            <p class="margin-panier">Total : <span class="prix">${uneinfo.prix * uneinfo.quantite}</span>€</p>
        </div>
        <div class="flex-center">
            <a href=""><span class="material-icons">delete</span></a>
        </div>
    </div>`
    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
    console.log(totalgeneral)
    document.querySelector('.total').innerHTML=totalgeneral;
    document.querySelector('.total2').innerHTML=totalgeneral;


})
document.querySelectorAll('.plus').forEach(clickplus)
document.querySelectorAll('.moins').forEach(clickmoins)

function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        console.log(qte)
        qte++;
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        console.log(prix)
        total= prix*qte;
        console.log(total)
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        let id = this.parentNode.id; // recupere l'id de l'article cliqué
        console.log(id)
        let index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
        console.log(index)
        montab[index].quantite	= parseInt(montab[index].quantite) +1; //incrementer la quantité
        let insertion = JSON.stringify(montab);
        console.log(insertion)
        document.cookie=`cart=${insertion}; path=/`;  // sauvegarde des infos dans le cookie "liste"
        document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

        totalgeneral += parseInt(prix);
        document.querySelector('.total').innerHTML=totalgeneral;
        document.querySelector('.total2').innerHTML=totalgeneral;
    })
}

function clickmoins(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        console.log(qte)
        if(qte>0){
            qte--;
            this.parentNode.querySelector('span').innerHTML=qte;
            prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
            console.log(prix)
            total= prix*qte;
            console.log(total)
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

            let id = this.parentNode.id; // recupere l'id de l'article cliqué
            console.log(id)
            let index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
            console.log(index)
            montab[index].quantite= parseInt(montab[index].quantite) -1; //incrementer la quantité
            let insertion = JSON.stringify(montab);
            console.log(insertion)
            document.cookie=`cart=${insertion}; path=/`;  // sauvegarde des infos dans le cookie "liste"
            document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

            totalgeneral -= parseInt(prix);
            document.querySelector('.total').innerHTML=totalgeneral;
            document.querySelector('.total2').innerHTML=totalgeneral;
            }
    })
}