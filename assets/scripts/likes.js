"use strict";

// Update like button live

const buttons = document.querySelectorAll(".like-btn");
const forms = document.querySelectorAll(".like-form");

forms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/likes.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        console.log(json.text);

        // const btn = event.target.querySelector(".like-btn");
        const number = event.target.querySelector(".like-counter");
        const likeIcons = event.target.querySelector(".like-icon");

        console.log(json.src);

        likeIcons.src = json.src;
        // btn.textContent = json.text;
        number.textContent = json.number;
      });
  });
});
