var element = document.querySelectorAll(".element");
element.forEach(function (el) {
  el.addEventListener("click", () => {
    console.log(el);
  });
});
