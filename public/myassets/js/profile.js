const profil = document.getElementById("profil");
const form = document.getElementById("form");

const ShowForm = () => {
    if (form.classList.contains("d-none")) {
        form.classList.remove("d-none");
    }
    profil.classList.add("d-none");
};

const ShowProfil = () => {
    if (profil.classList.contains("d-none")) {
        profil.classList.remove("d-none");
    }
    form.classList.add("d-none");
}
