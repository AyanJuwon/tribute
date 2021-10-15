//Upload file
const realFileBtn = document.getElementById("real-file-2");
const customBtn = document.getElementById("custom-button-2");
const customTxt = document.getElementById("custom-text-2");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

//Form Step 
const memorialSteps = document.querySelectorAll('.memorial-step');
const nextPage = document.querySelector('.next-btn');

memorialSteps.forEach(step => {
    nextPage.addEventListener('click', function () {
        if (step.classList.contains('memorial-step-active')) {
            step.classList.remove('memorial-step-active');
        } else {
            step.classList.add('memorial-step-active');
        }
    });
});
