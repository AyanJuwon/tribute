//Slider
const slider = function () {
    const slides = document.querySelectorAll('.slides');
    const dotContainer = document.querySelector('.dots');

    let curSlide = 0; 
    const maxSlides = slides.length;

    //Create dots based on slides 
    const createDots = function () {
        slides.forEach(function (_, i) {
            dotContainer.insertAdjacentHTML('beforeend', `<button class="dots__dot" data-slide="${i}"></button>`);
        });
    }

    //Function to Activate dot
    const activateDot = function (slide) { 
        document.querySelectorAll('.dots__dot').forEach(dot => dot.classList.remove('dots__dot--active'));
        document.querySelector(`.dots__dot[data-slide="${slide}"]`).classList.add('dots__dot--active');
    }

    //Function to go to a slide
    const goToSlide = function (slide) {
        slides.forEach((s, i) => s.style.transform = `translateX(${100 * (i - slide)}%)`);
    }

    //Next slide
    const nextSlide = function () {
        if (curSlide === maxSlides - 1) {
            curSlide = 0;
            // prevSlide();
        } else {
            curSlide++;
        }
    
        goToSlide(curSlide);
        activateDot(curSlide);
    }

    //Prev slide
    const prevSlide = function () {
        if (curSlide === 0) {
        curSlide = maxSlides - 1;
        } else {
        curSlide--;
        }

        goToSlide(curSlide);
        activateDot(curSlide);
    }

    const init = function () {
        goToSlide(0);
        createDots();
        activateDot(0);

        // Automate slide
        setInterval(nextSlide, 10000);
    }

    init();

    //Change slide with dots
    dotContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('dots__dot')) {
            //console.log(e.target.dataset);
            const { slide } = e.target.dataset;
            goToSlide(slide);

            activateDot(slide);
        }
    });

    
  //Change slide with keyboard arrow
  document.addEventListener('keydown', function (e) {
    e.key === 'ArrowLeft' && prevSlide();
    e.key === 'ArrowRight' && nextSlide();
  });

}

slider();

//FAQ
const allFAQ = document.querySelectorAll('.faq');

allFAQ.forEach(function (faq) {
    faq.addEventListener('click', function (e) {
        faq.classList.toggle('active');
        faq.firstElementChild.firstElementChild.classList.toggle('active');
        faq.firstElementChild.lastElementChild.classList.toggle('active');

        const content = faq.lastElementChild;

        if (faq.classList.contains('active')) content.style.maxHeight = content.scrollHeight + 'px';
        else content.style.maxHeight = 0;
    });
});