"use strict";
const searchForm = document.querySelector(".search-form");
const searchInput = document.querySelector(".search-input");
const list = document.querySelector(".search-output");

// Send search input to search.php and output search result in list items
searchInput.addEventListener("keyup", event => {
  event.preventDefault();

  if (event.keyCode == 13) {
    console.log(event.keyCode);
  }

  const formData = new FormData(searchForm);
  list.innerHTML = "";

  fetch("/app/users/search.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(outputs => {
      outputs.forEach(output => {
        const listItem = document.createElement("li");
        listItem.innerText = output.name;
        list.appendChild(listItem);
      });
    });
});

//Prevent user from resetting output by hitting enter
searchForm.addEventListener("submit", event => {
  event.preventDefault();
});
