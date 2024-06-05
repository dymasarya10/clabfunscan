// Animation
const InAnim = "animate__fadeInLeft";
const OutAnim = "animate__fadeOutLeft";

const InAnimPreview = "animate__fadeInDown";
const OutAnimPreview = "animate__fadeOutUp";

// Component
const titleContent = document.getElementById("AppTitleContent");
const imageContent = document.getElementById("AppImageContent");
const textContent = document.getElementById("AppTextContent");

// Container

const preview = document.getElementById("AppPreviewContent");
const contentList = document.getElementById("AppContentList");

// Action

const ShowPreviewContent = () => {
    if (preview.classList.contains("d-none")) {
        preview.classList.remove("d-none")
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
}

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = new simpleDatatables.DataTable("#table_konten", {
        columns: [
            // Urutkan kolom pertama (index 0) secara ascending
            { select: 0, sort: "asc" },
        ],
    });

});
