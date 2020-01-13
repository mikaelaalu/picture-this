"use strict";

// Update like button live
const forms = document.querySelectorAll(".like-form");

forms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/likes.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        const number = event.target.querySelector(".like-counter");
        const likeIcons = event.target.querySelector(".like-icon");

        if (json.number === "0") {
          number.textContent = " ";
        } else {
          number.textContent = json.number;
        }

        likeIcons.src = json.src;
      });
  });
});
