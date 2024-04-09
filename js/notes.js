const dialog = document.querySelector("#notesDialog");
const showButton = document.querySelector("#addNotes");
const closeButton = document.querySelector("#closeButton");

showButton.addEventListener("click", () =>{
    dialog.showModal();
});

closeButton.addEventListener("click", () =>{
    dialog.close();
});