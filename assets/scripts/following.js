"use strict";

// Update following live

const followingForms = document.querySelectorAll(".following");

followingForms.forEach(form => {
  form.addEventListener("submit", event => {
    event.preventDefault(); // Prevent page from reloading

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
        const following = document.querySelector(".following");
        const followers = document.querySelector(".followers");

        followBtn.textContent = json.button;
        following.textContent = json.following;
        followers.textContent = json.followers;
        console.log(json);
      });
  });
});
