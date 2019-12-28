"use strict";

// Update like button live

const buttons = document.querySelectorAll(".like-btn");
const forms = document.querySelectorAll(".like-form");
const likeCounters = document.querySelectorAll(".like-counter");

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

// likeIcons.forEach(icon => {
//   console.log(icon.src);
// });

// function changeIcon(event) {
//   const icon = event.target;
//   const liked = "/icons/liked.png";
//   const unliked = "/icons/unliked.png";

//   if ((icon.src = liked)) {
//     icon.src == unliked;
//   } else {
//     icon.src == liked;
//   }
// }

// likeIcons.forEach(function(likeIcon) {
//   likeIcon.addEventListener("click", changeIcon);
// });

// const img = document.querySelectorAll(".like-icon.src");
// const populateImg = res => {
//   const img = document.querySelector("like-icon");
//   img.setAttribute("src", json.icon);
// };

// Update comments live

// const commentsForms = document.querySelectorAll(".comments-form");

// commentsForms.forEach(form => {
//   form.addEventListener("submit", event => {
//     event.preventDefault(); // Prevent page from reloading

//     const formData = new FormData(form);

//     fetch(`http://localhost:8000/app/posts/comment-post.php`, {
//       method: "POST",
//       body: formData
//     })
//       .then(response => {
//         return response.json(); //  från json
//       })
//       .then(json => {
//         console.log(json.text);

//         // const btn = event.target.querySelector(".like-btn");
//         // const number = event.target.querySelector(".like-counter");

//         // btn.textContent = json.text;
//         // number.textContent = json.number;
//       });
//   });
// });
