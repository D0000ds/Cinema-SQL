icons.addEventListener("click", () => {
    nav.classList.add("active")
    button_id.classList.add("active")
    mobile.classList.add("active")

    
    iconsClose.style.setProperty('display', 'block', 'important')
    icons.style.setProperty('display', 'none', 'important')
})

iconsClose.addEventListener("click", ()=> {
    nav.classList.remove("active")
    button_id.classList.remove("active")
    mobile.classList.remove("active")

    iconsClose.style.setProperty('display', 'none', 'important')
    icons.style.setProperty('display', 'block', 'important')
})

let image = 1
const images = Array("o", "./public/img/barbie-film-margot-robbie-ryan-gosling-top.webp", "./public/img/Medellin-voici-l-astuce-pour-regarder-gratuitement-le-nouveau-film-de-Franck-Gastambide.jpg", "./public/img/Oppenheimer.webp", "o")


function imgSuivante() {
    do {
      image = (image + 1) % images.length;
      new_image = images[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
  }

function imgPrecedent() {
    do {
      image = (image - 1 + images.length) % images.length;
      new_image = images[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}


const imagesGenre = Array("o", "./public/img/2180999-elements-de-genre-de-film-vectoriel.jpg", "./public/img/icones-vectorielles-genres-films-plats-sport-mystere-drame-fantaisie-biographie-guerre-horreur-illustration-thriller_1284-42359.avif", "./public/img/film-genres-icon-set_1284-13873.avif", "o")
function imgSuivanteGenre() {
    do {
      image = (image + 1) % imagesGenre.length;
      new_image = imagesGenre[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

function imgPrecedentGenre() {
    do {
      image = (image - 1 + imagesGenre.length) % imagesGenre.length;
      new_image = imagesGenre[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

const imagesFilm = Array("o", "./public/img/GettyImages-1336937059-1600x728.jpg", "./public/img/DVD-disc-film-reel-cinema.jpg", "./public/img/Fvjxa2dXjqUiU1s6tXivHIDIX3E_.jpg", "o")
function imgSuivanteFilm() {
    do {
      image = (image + 1) % imagesFilm.length;
      new_image = imagesFilm[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

function imgPrecedentFilm() {
    do {
      image = (image - 1 + imagesFilm.length) % imagesFilm.length;
      new_image = imagesFilm[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

const imagesActeurs = Array("o", "./public/img/robert-downey-jr.jpeg", "./public/img/14_PATRICK_STEWART_SEE.webp", "./public/img/acteurs-mythiques.jpg", "o")
function imgSuivanteActeurs() {
    do {
      image = (image + 1) % imagesActeurs.length;
      new_image = imagesActeurs[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

function imgPrecedentActeurs() {
    do {
      image = (image - 1 + imagesActeurs.length) % imagesActeurs.length;
      new_image = imagesActeurs[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

const imagesRealisateurs = Array("o", "./public/img/devenir-acteur.jpeg", "./public/img/devenir-acteur.jpg", "./public/img/10694673.webp", "o")
function imgSuivanteRealisateurs() {
    do {
      image = (image + 1) % imagesRealisateurs.length;
      new_image = imagesRealisateurs[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}

function imgPrecedentRealisateurs() {
    do {
      image = (image - 1 + imagesRealisateurs.length) % imagesRealisateurs.length;
      new_image = imagesRealisateurs[image];
    } while (new_image === "o");
  
    document.getElementById("slide").src = new_image;
}
