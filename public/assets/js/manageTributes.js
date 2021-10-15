//Read more and read less
const noOfChar = 600;
const contents = document.querySelectorAll('.memorial-card-content');
const btns = document.querySelectorAll('.memorial-card-button');

contents.forEach(content => {
    if(content.textContent.length < noOfChar) {
        content.nextElementSibling.style.display = "none";
    } else {
        const displayText = content.textContent.slice(0, noOfChar);
        const moreText = content.textContent.slice(noOfChar);
        content.innerHTML = `${displayText}<span class="dots-text">...</span><span class="hide more">${moreText}</span>`;
    }
});

btns.forEach(btn => {
    btn.addEventListener('click', function () {
        const post = btn.parentElement;
        post.querySelector('.dots-text').classList.toggle('hide');
        post.querySelector('.more').classList.toggle('hide');
        btn.textContent == 'Read More' ? btn.textContent = 'Read Less' : btn.textContent = 'Read More';
    });
});