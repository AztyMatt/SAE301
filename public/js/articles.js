document.getElementById('ajout').addEventListener('click',function() {
    let id = parseInt(document.getElementById('id').value);
    let titre = document.getElementById('titre').innerHTML;
    let affiche = document.getElementById('affiche').src;
    let salle = document.getElementById('salle').innerHTML;
    let date = document.getElementById('date').innerHTML;
    let quantite = parseInt(document.getElementById('qte').value);
    let prix = parseInt(document.getElementById('prix').innerHTML);

    let index = montab.findIndex(element => element.id === id);
    if(index>-1){
        montab[index].quantite +=  parseInt(document.getElementById('qte').value);
    }else{
        montab.push({
            'id': id,
            'titre': titre,
            'affiche': affiche.substring(affiche.indexOf("/i") + 1),
            'salle': salle,
            'date': date,
            'quantite': quantite,
            'prix': prix });
    }
    let insertion = JSON.stringify(montab);
    document.cookie=`cart=${insertion}; path=/`;

    document.getElementById('message').innerHTML = `${quantite} place(s) pour ${titre} ajoutée(s) au panier !`
})