let delete_buttons = document.querySelectorAll(".delete_buttons");
let deleteted_id = document.querySelector("#deleted_id");
delete_buttons.forEach((a) => {
  a.addEventListener("click", () => {
    deleteted_id.value = a.getAttribute("data-id");
    document.querySelector("#delete_form").submit();
  });
});
