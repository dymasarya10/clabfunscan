// Animation
const InAnim = "animate__fadeInLeft";
const OutAnim = "animate__fadeOutLeft";

const InAnimPreview = "animate__fadeInDown";
const OutAnimPreview = "animate__fadeOutUp";

// Component
const titleContent = document.getElementById("AppTitleContent");
const imageContent = document.getElementById("AppImageContent");
const textContent = document.getElementById("AppTextContent");
const previewImagePost = document.getElementById("createPreviewImage");
const imageFieldPost = document.getElementById("gambar_post");
const CreateContentForm = document.getElementById("AppCreateContent");
const ContentList = document.getElementById("AppContentList");

// Container

const preview = document.getElementById("AppPreviewContent");
const contentList = document.getElementById("AppContentList");

// Action
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

const ShowPreviewContent = () => {
    if (preview.classList.contains("d-none")) {
        preview.classList.remove("d-none");
    }
    if (preview.classList.contains(OutAnimPreview)) {
        preview.classList.remove(OutAnimPreview);
    }
    preview.classList.add(InAnimPreview);
};

const ClosePreviewContent = () => {
    if (preview.classList.contains(InAnimPreview)) {
        preview.classList.remove(InAnimPreview);
    }
    preview.classList.add(OutAnimPreview);
    setTimeout(() => {
        preview.classList.add("d-none");
    },800);
};

document.addEventListener("DOMContentLoaded", function () {
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
});
