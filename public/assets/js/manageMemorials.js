//About editor
const toolbarOptionsAbout = [
  [{ 'size': ['small', false, 'large', 'huge']}],
  [{'font': []}],
  ['bold', 'italic', 'underline', 'strike'],
  ["link"],
  [{ list: "ordered" }, { list: "bullet" }],
  [{ indent:  "-1" }, { indent:  "+1" }, { align: [] }],
]

const optionsAbout = {
  //debug: 'info',
  modules: {
    toolbar: toolbarOptionsAbout
  },
  placeholder: 'Write a short biography..',
  readOnly: false,
  theme: 'snow'
};

const editorAbout = new Quill('#editor-about', optionsAbout);

//Life editor
const toolbarOptionsLife = [
  [{ 'size': ['small', false, 'large', 'huge'] }],
  [{ 'font': [] }],
  ['bold', 'italic', 'underline', 'strike'],
  ["link"],
  [{ list: "ordered" }, { list: "bullet" }],
  [{ indent: "-1" }, { indent: "+1" }, { align: [] }],
];

const optionsLife = {
  //debug: 'info',
  modules: {
    toolbar: toolbarOptionsLife
  },
  placeholder: 'Write a detailed life history..',
  readOnly: false,
  theme: 'snow',
  bounds: 'parent'
};

const editorLife = new Quill('#editor-life', optionsLife);

//Story editor
const toolbarOptionsStory = [
  [{ 'size': ['small', false, 'large', 'huge'] }],
  [{ 'font': [] }],
  ['bold', 'italic', 'underline', 'strike'],
  ["link"],
  [{ list: "ordered" }, { list: "bullet" }],
  [{ indent: "-1" }, { indent: "+1" }, { align: [] }],
];

const optionsStory = {
  //debug: 'info',
  modules: {
    toolbar: toolbarOptionsStory
  },
  placeholder: 'Tell a story..',
  readOnly: false,
  theme: 'snow',
  bounds: 'parent'
};

const editorStory = new Quill('#editor-story', optionsStory);


//Upload images
let imagesObject = [];

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = function(e) {
          displayImgData(e.target.result)
          addImage(e.target.result);
      };

      reader.readAsDataURL(f);
    }
}

function loadFromLocalStorage() {
  var images = JSON.parse(localStorage.getItem("images"))

  if(images && images.length > 0){
    imagesObject = images;

    displayNumberOfImgs();
    images.forEach(displayImgData);
  }
}

function addImage(imgData) {
  imagesObject.push(imgData);
  displayNumberOfImgs();
  localStorage.setItem("images", JSON.stringify(imagesObject));
}

function displayImgData(imgData) {
  var span = document.createElement('span');
  span.innerHTML = '<img class="thumb" src="' + imgData + '"/>';
  document.getElementById('list').insertBefore(span, null);
}

function displayNumberOfImgs() {
  if(imagesObject.length > 0){

    // document.getElementById("state").innerHTML = imagesObject.length + " image" + ((imagesObject.length > 1) ? "s" : "") + " added";

    document.getElementById("deleteImgs").style.display = "flex";

  } else {
    document.getElementById("state").innerHTML = `<img src="/assets/img/add-image-icon.svg"> Add Image `;
    document.getElementById("deleteImgs").style.display = "none";
  }
}

function deleteImages(e) {
  e.preventDefault();
  imagesObject = [];
  console.log(imagesObject);
  localStorage.removeItem("images");
  displayNumberOfImgs()
  document.getElementById('list').innerHTML = "";
  console.log(list);
}


const filesBtn = document.getElementById('files');
const stateBtn = document.getElementById('state');

stateBtn.addEventListener("click", function (e) {
  e.preventDefault();
  filesBtn.click();
});

filesBtn.addEventListener('change', handleFileSelect, false);
document.getElementById('deleteImgs').addEventListener("click", deleteImages);
loadFromLocalStorage();

//Show and Hide Story
const addStory = document.querySelector('.add-story');
const storyContainer = document.querySelector('.story-container');
console.log(storyContainer);

addStory.addEventListener('click', function (e) {
  e.preventDefault();
  console.log('click');
  // storyContainer.style.display = 'block';
  // addStory.style.display = 'none';
  storyContainer.classList.remove('hide');
  addStory.classList.add('hide');
});


//Attach file for story
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No image attached yet.";
  }
});

