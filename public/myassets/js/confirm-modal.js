const postForm = document.getElementById("post_form");
const updateForm = document.getElementById("update_form");
const deleteForm = document.getElementById("delete_form");

const deleteId = document.getElementById("delete_id");
const updateId = document.getElementById("update_id");

const confirmModal = document.getElementById("confirmButtonModal");
const paramsModal = document.getElementById("paramsModal");
const message = document.getElementById("confirmMessage");

const LoadConfirmData = (method,id = 0) => {
    switch (method) {
        case "post":
            message.innerText = "Apakah anda ingin membuat data ?";
            break;
        case "update":
            message.innerText = "Apakah anda ingin mengubah data ini ?";
            break;
        case "delete":
            message.innerText = "Apakah anda ingin menghapus data ini ?";
            deleteId.value = id;
            break;

        default:
            break;
    }
    paramsModal.value = method;
};

confirmModal.addEventListener('click', () => {
    switch (paramsModal.value) {
        case "post":
            postForm.submit();
            break;
        case "update":
            updateForm.submit();
            break;
        case "delete":
            deleteForm.submit();
            break;

        default:
            break;
    }
});
