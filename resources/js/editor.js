import EasyMDE from "easymde";
import 'easymde/dist/easymde.min.css'
import '../css/editor.css'

const textarea = document.querySelector("#editor");

const easyMDE = new EasyMDE({
    element: textarea,
    onToggleFullScreen: false,
    previewImagesInEditor: true,
    sideBySideFullscreen: false,
    initialValue: textarea.value,
    toolbar: [
        "bold",
        "italic",
        {
            name: "heading",
            className: "fa fa-header",
            title: "heading buttons",
            children: ["heading-1", "heading-2", "heading-3"],
        },
        "|",
        "quote",
        "code",
        "unordered-list",
        "ordered-list",
        "|",
        "link",
        "image",
        {
            name: "upload-image",
            action: EasyMDE.drawUploadedImage,
            className: "fa fa-upload",
            title: "Bold",
        },
        "|",
        "preview",
    ],
    uploadImage: true,
    imageUploadEndpoint: "",
    imagePathAbsolute: false,
});

document.querySelector("#form").addEventListener("submit", (event) => {
    event.target.document.querySelector("#content").value = easyMDE.value();
});
