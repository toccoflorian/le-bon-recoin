

const form = document.querySelector('form');
const registerElement = document.querySelector('#register');
const submitButtonElement = form.querySelector('#submit');

submitButtonElement.addEventListener('click', async event => {
    event.preventDefault()
    const formData = new FormData(form);
    await fetch('../../login.php', {
        method: 'POST',
        body: formData
    })
    if (document.cookie.includes('session')) {
        location.href = '/';
    }
})

registerElement.addEventListener('click', event => {
    event.preventDefault()

    location.href = '../../register.php';
})