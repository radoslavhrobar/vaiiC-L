function kontrolujEmail(email) {
    let format = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email.value === "") {
        return ["red", doplnkoveTexty.get(idPrvkov[0])]
    } else if (!format.test(email.value)) {
        return ["red", "Email musí byť v správnom formáte!"]
    } else {
        return ["lightgreen", ""]
    }
}
function kontrolujPMeno(pMeno) {
    if (pMeno.value === "") {
        return ["red",  doplnkoveTexty.get(idPrvkov[1])]
    } else if (pMeno.value.length < 3 || pMeno.value.length > 30) {
        return ["red", "Používateľské meno musí byť dlhé v rozmedzí od 3 do 30 znakov!"]
    } else if (!isNaN(pMeno.value.charAt(0))) {
        return ["red", "Prvý znak v používateľskom mene niesme byť číslica!"]
    } else if (/[^a-zA-Z0-9]/.test(pMeno.value)) {
        return ["red", "Používateľské meno môže obsahovať len alfanumerické znaky a musí byť bez medzier!"]
    } else {
        return ["lightgreen", ""]
    }
}
function kontrolujHeslo(heslo) {
    if (heslo.value === "") {
        return ["red", doplnkoveTexty.get(idPrvkov[2])]
    } else if (heslo.value.length < 8) {
        return ["red", "Heslo musí byť minimálne 8 znakov dlhé!"]
    } else if (!/[A-Z]/.test(heslo.value)) {
        return ["red", "Heslo musí obsahovať aspoň jedno veľké písmeno!"]
    } else if (!/[a-z]/.test(heslo.value)) {
        return ["red", "Heslo musí obsahovať aspoň jedno malé písmeno!"]
    } else if (!/[0-9]/.test(heslo.value)) {
        return ["red", "Heslo musí obsahovať aspoň jednu číslicu!"]
    } else if (!/[!@#$%^&*]/.test(heslo.value)) {
        return ["red", "Heslo musí obsahovať aspoň jeden zo špeciálnych znakov na výber! [!@#$%^&*]"]
    } else {
        return ["lightgreen", ""]
    }
}
function kontrolujOverenieHesla(overenieHesla, heslo) {
    if (overenieHesla.value === "") {
        return ["red", doplnkoveTexty.get(idPrvkov[3])]
    } else if (overenieHesla.value !== heslo.value) {
        return ["red", "Heslá sa musia zhodovať!"]
    } else {
        return ["lightgreen", ""]
    }
}
function kontrolujOsobne(osobne) {
    let format = /^[a-zA-ZáäčďéëíĺľňóöôřšťúüýžÁÄČĎÉËÍĹĽŇÓÖÔŘŠŤÚÜÝŽ]+$/u
    if (osobne.value === "") {
        return ["gray", ""]
    } else if (osobne.value.length > 30) {
        return ["red", "Meno nesmie prekročiť dĺžku 30 znakov!"]
    } else if (!format.test(osobne.value)) {
        return ["red", "Meno môže obsahovať iba písmená!"]
    } else if (osobne.value.charAt(0) !== osobne.value.charAt(0).toUpperCase()) {
        return ["red", "Meno musí začínať veľkým písmenom!"]
    } else {
        return ["lightgreen", ""]
    }
}

function kontrolujFormular() {
    let validny = true;
    let vysledokEmail = kontrolujEmail(document.getElementById(idPrvkov[0]));
    let vysledokPMeno = kontrolujPMeno(document.getElementById(idPrvkov[1]));
    let vysledokHeslo = kontrolujHeslo(document.getElementById(idPrvkov[2]));
    let vysledokOverenieHesla = kontrolujOverenieHesla(document.getElementById(idPrvkov[3]), document.getElementById(idPrvkov[2]));
    let vysledokMeno = kontrolujOsobne(document.getElementById(idPrvkov[4]));
    let vysledokPriezvisko = kontrolujOsobne(document.getElementById(idPrvkov[5]));

    let vysledkyPrvkov = [vysledokEmail, vysledokPMeno, vysledokHeslo, vysledokOverenieHesla, vysledokMeno, vysledokPriezvisko]
    vysledkyPrvkov.forEach(function(vysledok, i) {
        let element = document.getElementById(idPrvkov[i]);
        let elementSprava = document.getElementById(idSpravPrvkov[i]);
        updateVystupu(element, elementSprava, vysledok[0], vysledok[1])

        if (vysledok[0] === "red") {
            validny = false;
        }
    })
    return validny;
}

function aplikuj(idPrvku, idSpravy, funkciaKontroly, input, focusout) {
    let element = document.getElementById(idPrvku)
    let elementSprava = document.getElementById(idSpravy);

    if (input) {
        element.addEventListener("input", function() {
            let vlastnosti = idPrvku !== "overenieHesla" ? funkciaKontroly(element) : funkciaKontroly(element, document.getElementById(idPrvkov[2]))
            updateVystupu(element, elementSprava, vlastnosti[0], vlastnosti[1])
        })
    }

    if (focusout) {
        element.addEventListener("focusout", function() {
            if (element.value === "") {
                updateVystupu(element, elementSprava, "red", doplnkoveTexty.get(idPrvku))
            }
        })
    }
}

let odoslanie = document.getElementById("registracia")
odoslanie.addEventListener("submit", function(udalost) {
    if (!kontrolujFormular()) {
        udalost.preventDefault();
        alert("Formulár obsahuje chyby. Skontrolujte prosím všetky údaje.")
    }
})

function updateVystupu(element, elementSprava, farba, sprava) {
    element.style.borderColor = farba;
    elementSprava.textContent = sprava;
}

const idPrvkov = ["email", "pMeno", "heslo", "overenieHesla", "meno", "priezvisko", "registracia"];
const idSpravPrvkov = ["emailSprava", "pMenoSprava", "hesloSprava", "overenieHeslaSprava", "menoSprava", "priezviskoSprava"]
const doplnkoveTexty = new Map([[idPrvkov[0], "Zadaj email."], [idPrvkov[1],"Zadaj používateľské meno."], [idPrvkov[2], "Zadaj heslo."], [idPrvkov[3], "Zadaj kontrolu hesla."]])


aplikuj(idPrvkov[0], idSpravPrvkov[0], kontrolujEmail, true,true);
aplikuj(idPrvkov[1], idSpravPrvkov[1], kontrolujPMeno, true, true);
aplikuj(idPrvkov[2], idSpravPrvkov[2], kontrolujHeslo, true, true);
aplikuj(idPrvkov[3], idSpravPrvkov[3], kontrolujOverenieHesla, true, true);
aplikuj(idPrvkov[4], idSpravPrvkov[4], kontrolujOsobne, true, false);
aplikuj(idPrvkov[5], idSpravPrvkov[5], kontrolujOsobne, true, false);









