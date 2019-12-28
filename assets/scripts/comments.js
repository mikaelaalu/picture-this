"use strict";

// Update comments live

const commentsForms = document.querySelectorAll(".comments-form");

commentsForms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/comment-post.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        console.log(json.comment_by);

        const commentBy = event.target.querySelector(".comment-by");
        const comment = event.target.querySelector(".comment");

        commentBy.textContent = json.comment_by;
        comment.textContent = json.comment;
      });
  });
});
