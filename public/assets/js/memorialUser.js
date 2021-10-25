//Attach file for post
const postFileBtn = document.getElementById("post-file");
const postBtn = document.getElementById("post-button");
const postTxt = document.getElementById("post-text");

postBtn.addEventListener("click", function() {
  postFileBtn.click();
});

postFileBtn.addEventListener("change", function() {
  if (postFileBtn.value) {
    postTxt.innerHTML = postFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    postTxt.innerHTML = "No image attached yet.";
  }
});