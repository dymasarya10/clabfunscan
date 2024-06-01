const formEditData = document.getElementById("form_edit_data_jenjang");
const OpenEditFormData = (value) => {
    if (formEditData.classList.contains("d-none")) {
        formEditData.classList.remove("d-none");
        formEditData.classList.add("d-block");
    }
    document.getElementById("inputEdit").value = value.toUpperCase();
};
const CloseEditFormData = () => {
    if (formEditData.classList.contains("d-block")) {
        formEditData.classList.remove("d-block");
        formEditData.classList.add("d-none");
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = new simpleDatatables.DataTable("#table_jenjang", {
        columns: [
            // Urutkan kolom pertama (index 0) secara ascending
            { select: 0, sort: "asc" },
        ],
    });
    formEditData.classList.add("d-none");
});
