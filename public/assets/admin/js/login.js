const admin = document.querySelector("#adminButton");
const lecture = document.querySelector("#lectureButton");
const adminForm = document.querySelector(".container .admin-form");
const lectureForm = document.querySelector(".container .lecture-form");
const overlay_container = document.querySelector(".container .overlay-container");
const overlay = document.querySelector(".container .overlay-container .overlay");

admin.addEventListener("click", () => {
    overlay_container.style.transform = "translateX(100%)";
    overlay.style.transform = "translateX(-50%)";
    adminForm.classList.add("active");
    lectureForm.classList.remove("active");
});

lecture.addEventListener("click", () => {
    overlay_container.style.transform = "translateX(0)";
    overlay.style.transform = "translateX(0)";
    lectureForm.classList.add("active");
    adminForm.classList.remove("active");
});

// Prevent form submission if it's not active
document.querySelectorAll("form").forEach((form) => {
    form.addEventListener("submit", (event) => {
        if (!form.closest(".active")) {
            event.preventDefault();
        }
    });
});
