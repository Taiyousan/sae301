liste = recupCookie("panier")
if (liste!=null) var montab = JSON.parse(liste)
else montab = Array()
// console.log(montab)
document.getElementById('liste').value=JSON.stringify(montab);

// console.log(liste)

var totalgeneral=0
montab.forEach(uneinfo => {

    html = `<div id="${uneinfo.id}" class="panier_produit">
            <div class="panier_event"><p>L'événément : </p><p>${uneinfo.article}</p></div>
            <div class="panier_place"><p>Nombre de place : </p><button class="moins">-</button><span>${uneinfo.quantite}</span><button class="plus">+</button></div>
            <div class="panier_price"><p>Prix de la place : </p><span class="unitaire">${uneinfo.prix}</span>€</div>
            <div class="panier_total_price"><p>Prix total de l'événement : </p><span class="prix">${uneinfo.prix * uneinfo.quantite}</span>€</div>
            </div>`;

    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
})

function recupCookie(nom){

    if(document.cookie.length === 0)return null;

    var cookies = document.cookie.split("; "); //separe chaque parametre contenu dans le cookie
    cookies.forEach(element => {
        ligne=element.split("=");
        if(ligne[0]===nom) sortie =ligne[1]
        else sortie=null;
    })
    return sortie
}