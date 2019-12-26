"use strict";

// Update like button live

const buttons = document.querySelectorAll(".like-btn");
const forms = document.querySelectorAll(".like-form");
const likeCounters = document.querySelectorAll(".like-counter");
const likeIcon = document.querySelectorAll(".like-icon.src");

console.log(likeIcon);

forms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/likes.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json(); //  från json
      })
      .then(json => {
        console.log(json.text);

        const btn = event.target.querySelector(".like-btn");
        const number = event.target.querySelector(".like-counter");

        btn.textContent = json.text;

        number.textContent = json.number;
      });
  });
});

// Update comments live
