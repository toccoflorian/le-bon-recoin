


const submitButtonElement = document.querySelector('button');
const form = document.querySelector('form')

const sendData = () => { };

submitButtonElement.addEventListener('click', async event => {
    event.preventDefault()
    const formData = new FormData(form)
    let response = await fetch('../../create-article.php', {
        method: 'POST',
        body: formData
    })
    response = await response.text()
    console.log(response);
    // location.href = './profil.php';
})