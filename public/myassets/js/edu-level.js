const formParent = document.getElementById("form_jenjang");
const confirmModalMessage = document.getElementById("confirm_modal_message");
const mainFormEditData = document.getElementById("main_form_edit_data");
const editFormContainer = document.getElementById("form_container_edit");
const mainFormDeleteData = document.getElementById("main_form_delete_data");
const mainFormPostData = document.getElementById("main_form_post_data");
const postFormContainer = document.getElementById("form_container_post");
const yesButton = document.getElementById("confirm_modal_button_yes");
const paramsModal = document.getElementById("params");
const deleteField = document.getElementById("delete_field");
const InAnimation = "animate__fadeInLeft";
const OutAnimation = "animate__fadeOutLeft";

const OpenFormParent = (value, id, method) => {
    if (method === "edit") {
        if (editFormContainer.classList.contains("d-none")) {
            editFormContainer.classList.remove("d-none");
            postFormContainer.classList.add("d-none");
        }
        editFormContainer.classList.add("d-block");
    } else {
        if (postFormContainer.classList.contains("d-none")) {
            postFormContainer.classList.remove("d-none");
            editFormContainer.classList.add("d-none");
        }
        postFormContainer.classList.add("d-block");
    }

    if (
        formParent.classList.contains(OutAnimation) ||
        formParent.classList.contains("d-none")
    ) {
        formParent.classList.remove(OutAnimation);
        formParent.classList.remove("d-none");
    }
    formParent.classList.add(InAnimation);
    document.getElementById("inputEdit").value = value.toUpperCase();
    document.getElementById("id_jenjang").value = id;
};
const CloseFormParent = () => {
    if (formParent.classList.contains(InAnimation)) {
        formParent.classList.remove(InAnimation);
    }
    formParent.classList.add(OutAnimation);
    setTimeout(() => {
        formParent.classList.add("d-none");
    }, 600);
};
const LoadConfirmModal = (method, id) => {
    if (method == "edit") {
        confirmModalMessage.innerText =
            "Apakah anda yakin ingin mengubah data ini ?";
    } else if (method == "delete") {
        confirmModalMessage.innerText =
            "Apakah anda yakin ingin menghapus data ini ?";
        deleteField.value = id;
    } else {
        confirmModalMessage.innerText =
            "Apakah anda yakin ingin membuat data ?";
    }
    paramsModal.value = method;
};
yesButton.addEventListener("click", () => {
    if (paramsModal.value == "edit") {
        mainFormEditData.submit();
    } else if (paramsModal.value == "delete") {
        mainFormDeleteData.submit();
    } else {
        mainFormPostData.submit();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = new simpleDatatables.DataTable("#table_jenjang", {
        columns: [
            // Urutkan kolom pertama (index 0) secara ascending
            { select: 0, sort: "asc" },
        ],
    });
    mainFormDeleteData.addEventListener("submit", (event) => {
        event.preventDefault();
    });
    mainFormEditData.addEventListener("submit", (event) => {
        event.preventDefault();
    });
    mainFormPostData.addEventListener("submit", (event) => {
        event.preventDefault();
    });
});
