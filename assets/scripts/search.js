"use strict";
const searchForm = document.querySelectorAll(".search-form");

searchForm.addEventListener("submit", sendSearchInput);

function sendSearchInput(event) {
  event.preventDefault();

  const list = document.querySelector(".search-output");

  const formData = new FormData(searchForm);

  fetch("/app/posts/search.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(output => {
      const listItem = document.createElement("li");
      listItem.innerText = output;
      list.appendChild(listItem);
    });
}
