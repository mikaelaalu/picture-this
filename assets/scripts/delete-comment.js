"use strict";

// Delete comments live

const deleteCommentForm = document.querySelectorAll(".delete-comment-form");

deleteCommentForm.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/posts/delete-comment.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        // console.log(response);
        return response.json();
      })
      .then(json => {
        const commentBox = event.target.querySelector(".comments");

        function removeComment() {
          const target = event.target;
          const parent = target.parentElement;

          parent.parentNode.removeChild(parent);
          console.log(parent);
        }

        removeComment();

        console.log(commentBox);
        console.log("hi");
        console.log(json);
      });
  });
});
