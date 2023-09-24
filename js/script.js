document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    let currentIndex = 0;

    function showSlide(index) {
        const slides = slider.querySelectorAll('img');
        slides.forEach(slide => slide.style.display = 'none');
        slides[index].style.display = 'block';
    }

    function showNextSlide() {
        currentIndex = (currentIndex + 1) % slider.querySelectorAll('img').length;
        showSlide(currentIndex);
    }

    function showPrevSlide() {
        currentIndex = (currentIndex - 1 + slider.querySelectorAll('img').length) % slider.querySelectorAll('img').length;
        showSlide(currentIndex);
    }

    nextButton.addEventListener('click', showNextSlide);
    prevButton.addEventListener('click', showPrevSlide);

    setInterval(showNextSlide, 3000);
});

function openRegisterPage() {
    window.location.href = 'register.html';
}
