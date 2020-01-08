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

          //   commentBox.parentNode.removeChild(commentBox);
          //   return false;
        }

        removeComment();

        // const btn = document.createElement("BUTTON");

        // btn.textContent = json.btn;

        // document.comment.appendChild(btn);

        console.log(commentBox);
        console.log("hi");
        console.log(json);
      });
    //   .catch(err => {
    //     // Do something for an error here
    //     console.log("Error Reading data " + err);
    //   });
  });
});
