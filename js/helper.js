function scrollToFaq(event) {
    event.preventDefault();

    document
        .querySelector('.frequently-asked-questions')
        .scrollIntoView({ behavior: 'smooth' });
}

document.querySelector('#more-btn').addEventListener('click', scrollToFaq);
