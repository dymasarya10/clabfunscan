'use strict';

const dataContent = document.getElementById("data-content");
const data = JSON.parse(dataContent.getAttribute("data-contents"));
const resultContainer = document.getElementById("ResultContainer");
const scanContainer = document.getElementById("ScanContainer");
const title = document.getElementById("contentTitle");
const image = document.getElementById("contentImage");
const textContent = document.getElementById("contentText");
const contentLoader = document.getElementById("content-loader");
const InAnimResult = "animate__zoomInUp";
const message = document.getElementById("ErrMessage");
const camera = document.getElementById("thereader");

const altResultContainer = document.getElementById("altResultContainer");
const altTheResult = document.getElementById("theResult");
const altTitle = document.getElementById("altTitleContent");
const altImage = document.getElementById("altImageContent");
// const altText = document.getElementById("altTextContent");

let theText;


const AnimIn = "animate__slideInUp";
const AnimOut = "animate__slideOutDown";
const AnimParentIn = "animate__fadeIn";
const AnimParentOut = "animate__fadeOut";

const OpenResultContainer = (barcode) => {
    const foundContent = data.find(x => x.kode_qr === barcode);

    if (foundContent) {
        if (altResultContainer.classList.contains("d-none")) {
            altResultContainer.classList.remove("d-none");
        }
        if (altResultContainer.classList.contains(AnimParentOut)) {
            altResultContainer.classList.remove(AnimParentOut);
        }
        altResultContainer.classList.add(AnimParentIn);

        altTitle.innerText = foundContent.judul;
        altImage.src = `../../storage/${foundContent.gambar}`;
        theText.setData(foundContent.isi_konten);
    } else {
        if (resultContainer.classList.contains("d-flex")) {
            resultContainer.classList.remove("d-flex");
            resultContainer.classList.add("d-none");
        }
        message.classList.remove("d-none");
        message.classList.add("d-flex");
        scanContainer.classList.add("d-none");
    }
};

const CloseResultContainer = () => {
    if (altResultContainer.classList.contains(AnimParentIn)) {
        altResultContainer.classList.remove(AnimParentIn);
    }
    altResultContainer.classList.add(AnimParentOut);
    setTimeout(() => {
        altResultContainer.classList.add("d-none");
    }, 800);
    html5QrcodeScanner.start();
};


const html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
    fps: 10,
    qrbox: 250
});

const CloseResult = () => {
    title.innerText = "";
    image.src = "";
    textContent.innerHTML = "";

    if (scanContainer.classList.contains("d-none")) {
        scanContainer.classList.remove("d-none")
    }
    if (resultContainer.classList.contains("d-flex")) {
        resultContainer.classList.remove("d-flex");
        resultContainer.classList.add("d-none");
    }
    if (message.classList.contains("d-flex")) {
        message.classList.remove("d-flex");
        message.classList.add("d-none");
    }
    if (camera.classList.contains("d-none")) {
        camera.classList.remove("d-none");
    }
}

function onScanSuccess(decodedText, decodedResult) {
    OpenResultContainer(decodedText);
    html5QrcodeScanner.stop();
};
html5QrcodeScanner.render(onScanSuccess);

document.addEventListener("DOMContentLoaded", () => {
    ClassicEditor.create(document.querySelector("#theText"), {
        removePlugins: ["Heading"],
        toolbar: [],
    }).then(editor => {
        // Set editor to read-only mode
        editor.enableReadOnlyMode('theText');
        theText = editor;
    }).catch((error) => {
        console.error(error);
    });
})
