// Animation
let InAnim = "animate__fadeInLeft";
let OutAnim = "animate__fadeOutLeft";

let InAnimPreview = "animate__fadeInDown";
let OutAnimPreview = "animate__fadeOutUp";

// Component
let editTextContent;
const idEdit = document.getElementById("id_update");
const titleContent = document.getElementById("AppTitleContent");
const imageContent = document.getElementById("AppImageContent");
const textContent = document.getElementById("AppTextContent");
const previewImagePost = document.getElementById("createPreviewImage");
const previewImageEdit = document.getElementById("editPreviewImage");
const imageFieldPost = document.getElementById("gambar_post");
const titleContentEdit = document.getElementById("judul_edit");
const CreateContentForm = document.getElementById("AppCreateContent");
const ContentList = document.getElementById("AppContentList");
const EditContentForm = document.getElementById("AppEditContent");

// Container

const preview = document.getElementById("AppPreviewContent");
const contentList = document.getElementById("AppContentList");

// Action
const ShowEditContentForm = (data, encryptedId) => {
    if (EditContentForm.classList.contains("d-none")) {
        EditContentForm.classList.remove("d-none")
    }
    if (EditContentForm.classList.contains(InAnim)) {
        EditContentForm.classList.remove(InAnim)
    }
    idEdit.value = encryptedId;
    titleContentEdit.value = data.judul;
    previewImageEdit.src = `../../storage/${data.gambar}`;
    editTextContent.setData(data.isi_konten);
    ContentList.classList.add("d-none");
    EditContentForm.classList.add(InAnim);
};

const ShowCreateContentForm = () => {
    if (CreateContentForm.classList.contains("d-none")) {
        CreateContentForm.classList.remove("d-none")
    }
    if (CreateContentForm.classList.contains(InAnim)) {
        CreateContentForm.classList.remove(InAnim)
    }
    ContentList.classList.add("d-none");
    CreateContentForm.classList.add(InAnim);
};

const ShowContentList = method => {
    switch (method) {
        case "post":
            CreateContentForm.classList.add("d-none");
            break;
        case "edit":
            EditContentForm.classList.add("d-none");
            break;

        default:
            break;
    }

    if (ContentList.classList.contains("d-none")) {
        ContentList.classList.remove("d-none")
    }
    if (ContentList.classList.contains(InAnim)) {
        ContentList.classList.remove(InAnim)
    }

    ContentList.classList.add(InAnim);
};

const PreviewImagePost = (event) => {
    let reader = new FileReader();
    reader.onload = () => {
        previewImagePost.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

const PreviewImageEdit = event => {
    let reader = new FileReader();
    reader.onload = () => {
        previewImageEdit.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

const ShowPreviewContent = data => {
    if (preview.classList.contains("d-none")) {
        preview.classList.remove("d-none");
    }
    if (preview.classList.contains(OutAnimPreview)) {
        preview.classList.remove(OutAnimPreview);
    }
    titleContent.innerText = data.judul;
    imageContent.src = `../../storage/${data.gambar}`;
    textContent.innerHTML = data.isi_konten;

    preview.classList.add(InAnimPreview);
};

const ClosePreviewContent = () => {
    if (preview.classList.contains(InAnimPreview)) {
        preview.classList.remove(InAnimPreview);
    }
    preview.classList.add(OutAnimPreview);
    setTimeout(() => {
        preview.classList.add("d-none");
    }, 800);
};

document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth < 1200) {
        InAnimPreview = "animate__fadeInLeft";
        OutAnimPreview = "animate__fadeOutLeft";
    }

    const dataTable = new simpleDatatables.DataTable("#table_konten", {
        columns: [
            // Urutkan kolom pertama (index 0) secara ascending
            { select: 0, sort: "asc" },
        ],
    });

    ClassicEditor.create(document.querySelector("#editor"), {
        removePlugins: ["Heading"],
        toolbar: ["bold", "italic", "bulletedList", "numberedList", "link"],
    }).catch((error) => {
        console.error(error);
    });

    ClassicEditor.create(document.querySelector("#editor_edit"), {
        removePlugins: ["Heading"],
        toolbar: ["bold", "italic", "bulletedList", "numberedList", "link"],
    }).then(editor => {
        editTextContent = editor;
    }).catch((error) => {
        console.error(error);
    });
});
