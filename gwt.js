// Farbmodus konfigurieren
function farbmodusWechseln() {
    if (farbmodus == "hell") {
        body.classList.replace("farbmodus--hell", "farbmodus--dunkel");
        farbmodus = "dunkel";
    } else {
        body.classList.replace("farbmodus--dunkel", "farbmodus--hell");
        farbmodus = "hell";
    }
    localStorage.farbmodus = farbmodus;
}

console.log("Hallo Welt");

// Mobile Ansicht Seitenleiste
function seitenleisteZeigen() {
    document.querySelector(".inhalt__overlay").classList.add("inhalt__overlay--sichtbar");
    document.querySelector(".seitenleiste").classList.replace("seitenleiste--versteckt", "seitenleiste--sichtbar");
}
function seitenleisteVerstecken() {
    document.querySelector(".inhalt__overlay").classList.remove("inhalt__overlay--sichtbar");
    document.querySelector(".seitenleiste").classList.replace("seitenleiste--sichtbar", "seitenleiste--versteckt");
}

// Seitenleiste ein- und ausfahren
function seitenleisteEinfahren() {
    document.querySelector(".seitenleiste__umschalten").classList.toggle("seitenleiste__umschalten--aktiv");
    document.querySelector(".seitenleiste").classList.toggle("seitenleiste--versteckt-desktop");
    document.querySelector(".inhalt").classList.toggle("inhalt--gross");
}

// Teilen-Menü
function share() {
    const title = document.title;
    var url = document.location.href;
    if (document.querySelector("link[rel=canonical]")) {
        url = document.querySelector('link[rel=canonical]').href;
    }

    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        }).catch(console.error);
    } else {
        
    }
}