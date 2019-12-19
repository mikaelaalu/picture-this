"use strict";

const buttons = document.querySelectorAll(".like-btn");
const forms = document.querySelectorAll(".like-form");
function sayhey() {
  console.log("hej");
}

// likeBtn.forEach(btn => {
//   btn.addEventListener("click", sayhey);
//   console.log(btn.dataset);
// });
// addEventListener(
//   "click",
//   likeBtn.forEach(btn => {
//     console.log("hej");
//   })
// );

forms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading
  });
});

buttons.forEach(btn => {
  btn.addEventListener("click", event => {
    const form = event.target.parentElement;
    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/likes.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json(); // gör till javascript från json
      })
      .then(like => {
        console.log(like);
      });
  });
});
