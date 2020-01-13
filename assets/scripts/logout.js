"use strict";

const logout = document.querySelector(".logout");

if (logout) {
  logout.addEventListener("click", function(event) {
    const confirmLogout = confirm(
      "Are you sure you want to log out? We will miss you"
    );

    if (!confirmLogout) {
      event.preventDefault();
    }
  });
}
