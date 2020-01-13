"use strict";

const followingForms = document.querySelectorAll(".following");

followingForms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch(`http://localhost:8000/app/users/following.php`, {
      method: "POST",
      body: formData
    })
      .then(response => {
        return response.json();
      })
      .then(json => {
        const followBtn = event.target.querySelector(".followBtn");
        const followers = document.querySelector(".followers");

        followBtn.textContent = json.button;
        followers.textContent = json.followers;
      });
  });
});
