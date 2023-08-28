

const form = document.querySelector('form');

const formButtonElement = form.querySelector('button');

formButtonElement.addEventListener('click', async event => {
    event.preventDefault()
    const formData = new FormData(form);

    const response = await fetch('../../register.php?', {
        method: 'POST',
        body: formData,
    });
    const b = await response.text();



})