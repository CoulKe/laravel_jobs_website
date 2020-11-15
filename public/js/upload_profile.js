let picLink = document.querySelector("#add-pic-link");
let form = document.querySelector("#upload-profile");

picLink.addEventListener("click", function(e) {
    e.preventDefault();
    picLink.style = "display: none";
    form.style = "display: block";
});
