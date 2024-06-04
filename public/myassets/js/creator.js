const InAnim = "animate__fadeInLeft";
const OutAnim = "animate__fadeOutRight";

const creatorList = document.getElementById("creator_list");
const createCreator = document.getElementById("create_creator");
const updateCreator = document.getElementById("update_creator");

const image = document.getElementById("foto_field");
const nama_pengguna = document.getElementById("nama_pengguna_field");
const nama = document.getElementById("nama_field");
const email = document.getElementById("email_field");
const edulevel = document.getElementById("edulevel_field");
const id = document.getElementById("id_field");

const previewEditImage = (event) => {
    let reader = new FileReader();
    reader.onload = () => {
        image.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

const ShowUpdateForm = (data, encryptedId) => {
    if (updateCreator.classList.contains("d-none")) {
        updateCreator.classList.remove("d-none");
    }
    updateCreator.classList.add(InAnim);
    creatorList.classList.add("d-none");


    image.src = `../../storage/${data.user.foto}`;
    nama_pengguna.value = data.user.nama_pengguna;
    nama.value  = data.user.nama;
    email.value = data.user.email;
    id.value = encryptedId;
    for (let i = 1; i < edulevel.options.length; i++) {
        if (Number(atob(edulevel.options[i].value)) === data.education_level_id) {
            edulevel.selectedIndex = i;
        }
    }
};

const ShowCreatorList = (form) => {
    switch (form) {
        case "create":
            if (createCreator.classList.contains("d-block")) {
                createCreator.classList.remove("d-block")
            }
            createCreator.classList.add("d-none");
            break;

        case "update":
            if (updateCreator.classList.contains("d-block")) {
                updateCreator.classList.remove("d-block")
            }
            updateCreator.classList.add("d-none");
            break;

        default:
            break;
    }
    if (creatorList.classList.contains("d-none")) {
        creatorList.classList.remove("d-none");
    }
    creatorList.classList.add("d-block");
    creatorList.classList.add(InAnim);
};

const ShowCreateForm = () => {
    if (createCreator.classList.contains("d-none")) {
        createCreator.classList.remove("d-none");
    }
    createCreator.classList.add(InAnim);
    creatorList.classList.add("d-none");
};


const previewImage = (event) => {
    let reader = new FileReader();
    reader.onload = () => {
        let output = document.getElementById('previewImg');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = new simpleDatatables.DataTable("#table_creator", {
        columns: [
            // Urutkan kolom pertama (index 0) secara ascending
            { select: 0, sort: "asc" },
        ],
    });

});
