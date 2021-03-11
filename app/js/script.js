

const burgerMenu = () => {

    let element = document.querySelector(".navbar-link").style;
    let headerSize = document.querySelector(".navbar").style;
    let buttonCo = document.querySelector("#button-connexion").style;
    let buttonIn = document.querySelector("#button-inscription").style;
    let buttonParametre = document.querySelector("#param").style;


    let off = element.display == "none";
    let on = element.display == "flex";

    if (off) {
        // Si navbar non affichée, permet affichage de celle-ci avec les propriétés ci-dessous.
        element.display = "flex";
        element.flexDirection = "column";
        headerSize.height = "16.5rem";
        headerSize.transition = "all 0.15s ease";
        buttonCo.display = "flex";
        buttonCo.justifyContent = "center";
        buttonCo.marginRight = "-2rem";
        if(hide == false) {
            buttonIn.display ="flex";
            buttonIn.justifyContent = "center";
            buttonIn.marginRight = "-2rem";
        }

        if(hide == true) {
            buttonParametre.display ="flex";
            buttonParametre.justifyContent = "center";
            buttonParametre.marginRight = "-2rem";
        }

    } else if (on) {
        // Si navbar affichée, permet de la cachée avec les propriétés ci-dessous.
        element.display = "none";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        // buttonIn.display ="none";
    }

}

const whileEvent = (query) => {

    let element = document.querySelector(".navbar-link").style;
    let headerSize = document.querySelector(".navbar").style;
    let buttonCo = document.querySelector("#button-connexion").style;
    let buttonIn = document.querySelector("#button-inscription").style;
    let buttonParam = document.querySelector("#param").style;

    let resolutionInferieurTablette = query.matches;


    if (resolutionInferieurTablette) {
        // Si la résolution est inférieur à 770px cache la navbar, boutons connexion et inscription.
        element.display = "none";
        buttonCo.display = "none";
        buttonIn.display = "none";
        

    } else {
        // Si la résolution est supérieur à 770px affiche la navbar avec les propiétées d'une tablette.
        element.display = "inline-block";
        headerSize.height = "5.5rem";
        buttonCo.display = "none";
        buttonIn.display = "none";
        buttonParam.display = "none";
        
    } 
}

let query = window.matchMedia("(max-width: 770px)"); // Défini un média query avec max-width à 770px
whileEvent(query);                                  // Appelle la fonction permettant d'appliquer la condition du média query
query.addEventListener("change", whileEvent); // Permet de définir les propriétés suite au changement de résolution



const confirmPassword = () => {
    let password = document.querySelector("#password").value;
    let passwordConfirm = document.querySelector("#passwordConfirm").value;

    alert('On peux recup la value');
}
