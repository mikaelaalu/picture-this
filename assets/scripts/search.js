"use strict";
const searchForm = document.querySelector(".search-form");
const searchInput = document.querySelector(".search-input");
const list = document.querySelector(".search-output");

// Send search input to search.php and output search result in list items
searchInput.addEventListener("keyup", event => {
  event.preventDefault();

  const formData = new FormData(searchForm);
  list.innerHTML = "";

  fetch("/app/users/search.php", {
    method: "POST",
    body: formData
  })
    .then(response => response.json())
    .then(outputs => {
      outputs.forEach(output => {
        const link = document.createElement("a");
        const listItem = document.createElement("li");
        const avatar = document.createElement("img");

        link.href = "profile.php?id=" + output.id;

        if (output.avatar_name) {
          avatar.src = "/uploads/" + output.avatar_name;
        } else {
          avatar.src = "/icons/persona.png";
        }
        const text = document.createTextNode(output.name);
        listItem.appendChild(link);
        link.appendChild(avatar);
        link.appendChild(text);
        list.appendChild(listItem);
      });
    });
});

//Prevent user from resetting output by hitting enter
searchForm.addEventListener("submit", event => {
  event.preventDefault();
});
