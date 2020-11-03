document.querySelector('#more-btn').addEventListener('click', (event) => {
    event.preventDefault();

    document
        .querySelector('.frequently-asked-questions')
        .scrollIntoView({ behavior: 'smooth' });
});
