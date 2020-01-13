"use strict";

const deleteCommentForm = document.querySelectorAll(".delete-comment-form");

deleteCommentForm.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault();
    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/delete-comment.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        function removeComment() {
          const target = event.target;
          const parent = target.parentElement;

          parent.parentNode.removeChild(parent);
        }

        removeComment();
      });
  });
});
