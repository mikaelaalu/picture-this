"use strict";

const logout = document.querySelector(".logout");

logout.addEventListener("click", function(event) {
  const confirmLogout = confirm(
    "Are you sure you want to log out? We will miss u"
  );

  if (!confirmLogout) {
    event.preventDefault();
  }
});
