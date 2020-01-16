"use strict";

const radioButtons = document.querySelectorAll("input[name=filter]");
const previewImageWrapper = document.querySelector(".preview-image-wrapper");

radioButtons.forEach(radioButton => {
  radioButton.addEventListener("change", addFilterToImage);
});

function addFilterToImage(event) {
  let filterClass = event.currentTarget.value;
  previewImageWrapper.classList.remove(previewImageWrapper.classList[1]);
  previewImageWrapper.classList.add(filterClass);
}
