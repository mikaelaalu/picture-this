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
        console.log(json);

        const commentBy = event.target.querySelector(".comment-by");
        const comment = event.target.querySelector(".comment");
        // const deleteComment = event.target.querySelector(".delete-comment");

        // deleteComment.textContent = json.delete_comment;
        commentBy.textContent = json.comment_by;
        comment.textContent = json.comment;
      });
  });
});
