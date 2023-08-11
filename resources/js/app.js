import Alpine from "alpinejs";
import "flowbite";
// import "./bootstrap";

// alpine init
document.addEventListener("DOMContentLoaded", function () {
  Alpine.start();
});

// state loading page
document.onreadystatechange = function () {
  if (document.readyState !== "complete") {
    document.querySelector("body").style.visibility = "hidden";
    document.getElementById("loading-overlay").style.visibility = "visible";
  } else {
    document.getElementById("loading-overlay").style.display = "none";
    document.querySelector("body").style.visibility = "visible";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const message = document.querySelector(".message");
  if (message) {
    setTimeout(() => {
      message.style.display = "none";
    }, 2000);
  }
});

