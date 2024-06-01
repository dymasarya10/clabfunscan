window.addEventListener("DOMContentLoaded", (event) => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatables = document.getElementsByClassName("thedatatables");
    for (let i = 0; i < datatables.length; i++) {
        if (datatables[i]) {
            new simpleDatatables.DataTable(datatables[i]);
        }
    }
});
