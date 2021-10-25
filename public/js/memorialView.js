//Tabbed Component
const tabs = document.querySelectorAll('[data-tab-target]');
const tabContents = document.querySelectorAll('[data-tab-content]');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget);

        tabContents.forEach(tabContent => {
            tabContent.classList.remove('active')
        });

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tab.classList.add('active')
        target.classList.add('active');
    });
});

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

//Menu option
// const menuImg = document.querySelector('.story-card__more-menu-img');
// const menuNoImg = document.querySelector('.story-card__more-no-img');
// const moreIcon = document.querySelector('.story-card__more-icon');
// const moreIconNoImg = document.querySelector('.story-card__more-icon-noImg');

// moreIcon.addEventListener('click', function () {
//     menuImg.classList.toggle('hide');
// });

// moreIconNoImg.addEventListener('click', function () {
//     menuNoImg.classList.toggle('hide');
// });
