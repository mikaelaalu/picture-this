"use strict";

const likeBtn = document.querySelectorAll(".like-btn");
const likeForm = document.querySelectorAll(".like-form");
function sayhey() {
  console.log("hej");
}

<<<<<<< Updated upstream
likeBtn.forEach(btn => {
  btn.addEventListener("click", sayhey);
  console.log(btn.dataset);
});
=======
addEventListener(
  "click",
  likeBtn.forEach(btn => {
    console.log("hej");
  })
);

console.log(likeForm);
>>>>>>> Stashed changes

const formData = new formData();

fetch("https://http://localhost:8000/app/posts/likes.php", {
  method: "POST",
  body: formData
})
  .then(response => response.json())
  .then(like => {
    console.log("like");
  });
