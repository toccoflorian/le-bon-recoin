


// event listener 'editer une annonce'
const vendreElement = document.querySelector('#edit');
vendreElement.addEventListener('click', event => {
    location.href = './create-article.php';
})


// event listener 'Inscription'
const inscriptionElement = document.querySelector('#register');
inscriptionElement.addEventListener('click', event => {
    location.href = './register.php'
})

// event listener 'Profil'
const profilElement = document.querySelector('#profil');
profilElement.addEventListener('click', event => {
    location.href = './profile.php'
})

// event listener 'login'
const loginElement = document.querySelector('#login');
loginElement.addEventListener('click', event => {
    location.href = './login.php'
})

// event listener 'logout'
const logoutElement = document.querySelector('#logout');
logoutElement.addEventListener('click', event => {
    fetch('./logout.php')
})

// event listener 'articles'
const articlesElement = document.querySelector('#articles');
articlesElement.addEventListener('click', event => {
    location.href = 'show-articles.php'
})

// const test = document.createElement('h1');
// test.textContent = 'SALUT LES LOULOUS';

// const body = document.querySelector('body');
// const content = document.querySelector('.content');
// const btnReceve = document.querySelector('footer > button[name="recevoir"]');
// const btnSend = document.querySelector(' button[name="envoyer"]');

// btnReceve.addEventListener('click', async event => {
//     content.appendChild(test)
//     const dos = 'index.php';
//     const response = await fetch(dos);
//     const h2 = document.createElement('h2')
//     const r = await response.text()
//     h2.innerHTML = r
//     content.appendChild(h2)
//     console.log(r);
// })
// btnSend.addEventListener('click', async event => {
//     console.log('event!!');
//     const data = new FormData();
//     console.log();
//     data.append('text', 'Depuis le JavaScript: okkaaayyyy !!!!')
//     try {
//         const response = await fetch('index.php', {
//             method: 'POST',
//             body: data,
//         });
//         const r = await response.text();
//         console.log(r);
//         body.appendChild(r)
//     } catch (e) {
//         console.log(e);
//     }
// })