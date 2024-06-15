const checkAPIS = async (urls) => {
    // Validasi bahwa urls adalah array objek
    if (!Array.isArray(urls) || !urls.every(urlObj => typeof urlObj === 'object' && urlObj !== null)) {
        throw new Error('Parameter must be an array of objects.');
    }

    const errors = [];

    const requests = urls.map(urlObj =>
        fetch(urlObj.url, { method: 'HEAD' })
            .then(response => {
                if (!response.ok) {
                    errors.push(urlObj.nama);
                }
            })
            .catch(error => {
                errors.push(urlObj.nama);
            })
    );

    await Promise.all(requests);

    return errors;
};

const urls = [
    {nama: "simple-datatables", url: "https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"},
    {nama: "animate-css", url: "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"},
    {nama: "font-awesome", url: "https://use.fontawesome.com/releases/v6.3.0/js/all.js"},
    {nama: "ck-editor5", url: "https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"},
    {nama: "bs5-js", url: "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"},
    {nama: "chart.js", url: "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"},
    {nama: "simple-datatables.js", url: "https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"},
    {nama: "html5-qrcode", url:"https://unpkg.com/html5-qrcode"}
];

checkAPIS(urls).then(all_errors => {
    if (all_errors.length > 0) {
        document.getElementById("ErrMessage").classList.remove("d-none");
        // document.getElementById("ErrMessage").innerText = all_errors.join(",");
    }
}).catch(error => {
    console.error(error.message);
});
