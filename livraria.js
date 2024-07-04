
function getBookMV(isbn) {
    fetch('https://openlibrary.org/isbn/'+isbn+'.json')
    .then((result) => result.json())
    .then ((response) => {
        console.log(response);
        const divTitle = document.getElementsByClassName('card-title');
        const divText = document.getElementsByClassName('card-text');

        for(let i = 0; i < 5; i++) {
            divTitle[i].innerText = response.title;
            divTitle[i].id = isbn;
            divText[i].innerText = response.publishers;
            divText[i].id = isbn;
        }
    })

    const divCover = document.getElementsByClassName('card-img-top');

    for(let i = 0; i < 5; i++) {
        divCover[i].src = 'https://covers.openlibrary.org/b/isbn/'+isbn+'-L.jpg';
        divCover[i].id = isbn;
    }
}

function getBookRA(isbn) {
    fetch('https://openlibrary.org/isbn/'+isbn+'.json')
    .then((result) => result.json())
    .then ((response) => {
        console.log(response);
        const divTitle = document.getElementsByClassName('card-title');
        const divText = document.getElementsByClassName('card-text');

        for(let i = 5; i < divTitle.length; i++) {
            divTitle[i].innerText = response.title;
            divTitle[i].id = isbn;
            divText[i].innerText = response.publishers;
            divText[i].id = isbn;
        }
    })

    const divCover = document.getElementsByClassName('card-img-top');

    for(let i = 5; i < divCover.length; i++) {
        divCover[i].src = 'https://covers.openlibrary.org/b/isbn/'+isbn+'-L.jpg';
        divCover[i].id = isbn;
    }
}

function buttonBarMV(){
    const divTitle = document.getElementsByClassName('card-title');

    if (divTitle[0].id=='9780062059932'){
        getBookMV('9780545688161');
    }else if (divTitle[0].id=='9780545688161'){
        getBookMV('9780062059932');
    }
}

function buttonBarRA(){
    const divTitle = document.getElementsByClassName('card-title');

    if (divTitle[5].id=='9780062059932'){
        getBookRA('9780545688161');
    }else if (divTitle[5].id=='9780545688161'){
        getBookRA('9780062059932');
    }
}
function createCookie(){
    document.cookie = "notLogged";
    console.log(document.cookie);
}

function checkLogIn(){
    let loggedIn=document.cookie;
    const login = document.getElementsByClassName('btn-login');
    console.log(loggedIn);
    /*if (loggedIn != 'logged'){
        //login[0].href = "login.html";
        document.cookie = "logged";
    }else if (loggedIn =='logged'){
        //login[0].href = "Perfil.html";
    }*/
    login[0].href = "Perfil.html";
}