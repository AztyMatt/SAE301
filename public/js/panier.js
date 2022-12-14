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

function test_tab(){
    if (montab.length === 0){
        const elements = document.getElementById('zone').parentNode.parentNode.querySelectorAll('.file, .tag-total, .text-right, .commander')
            for (const element of elements){
                element.classList.add('none');
        }
        document.getElementById('zone').innerHTML = `<h2 class="text-center">Votre panier est vide !</h2>`
    }
    document.getElementById('liste').value=JSON.stringify(montab);

    var panier = 0;
    montab.forEach(element => { panier += parseInt(element.quantite) });
    document.getElementById('nb-panier').innerHTML = panier;
}

test_tab();

var totalgeneral=0
montab.forEach(uneinfo => {

    let html = `
    <div id="${uneinfo.id}" class="flex grid">
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
            <span class="material-icons supp">delete</span>
        </div>
    </div>`
    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
    document.querySelector('.total').innerHTML=totalgeneral;
    document.querySelector('.total2').innerHTML=totalgeneral;
})

document.querySelectorAll('.plus').forEach(clickplus)
document.querySelectorAll('.moins').forEach(clickmoins)
document.querySelectorAll('.supp').forEach(supp)

function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        qte++;
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        total= prix*qte;
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        let id = this.parentNode.id;
        let index = montab.findIndex(element => element.id == id);
        montab[index].quantite	= parseInt(montab[index].quantite) +1;
        let insertion = JSON.stringify(montab);
        document.cookie=`cart=${insertion}; path=/`;
        document.getElementById('liste').value=JSON.stringify(montab);

        totalgeneral += parseInt(prix);
        document.querySelector('.total').innerHTML=totalgeneral;
        document.querySelector('.total2').innerHTML=totalgeneral;
        test_tab();
    })
}

function clickmoins(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        if(qte>0){
            qte--;
            this.parentNode.querySelector('span').innerHTML=qte;
            prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
            total= prix*qte;
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

            let id = this.parentNode.id;
            let index = montab.findIndex(element => element.id == id);
            montab[index].quantite= parseInt(montab[index].quantite) -1;
            let insertion = JSON.stringify(montab);
            document.cookie=`cart=${insertion}; path=/`;
            document.getElementById('liste').value=JSON.stringify(montab);

            totalgeneral -= parseInt(prix);
            document.querySelector('.total').innerHTML=totalgeneral;
            document.querySelector('.total2').innerHTML=totalgeneral;
            test_tab();
        }
    })
}

function supp(tag){
    tag.addEventListener('click',function() {
        let id=this.parentNode.parentNode.id;
        let element = document.getElementById(id);
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }
        element.remove();

        let index = montab.findIndex(element => element.id == id);
        montab.splice(index, 1);
        let insertion = JSON.stringify(montab);
        document.cookie=`cart=${insertion}; path=/`;
        document.getElementById('liste').value=JSON.stringify(montab);
        test_tab();
    })
}