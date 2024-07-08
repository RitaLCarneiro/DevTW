var aboutMe_original;
var bookStart=0;
var newBook="";
const currentFile = window.location.pathname.split('/').pop();
if(currentFile=="Perfil.php"){
    document.addEventListener('DOMContentLoaded', function() {
        loadBooks();
    });
}
if(currentFile=="Livro.php"){
    document.addEventListener('DOMContentLoaded', function() {
        loadSugestions();
    });
}

function editAboutMe(){
    fetch('aboutMe.json')
    .then(response => response.json())
    .then(data => {
        aboutMe_original = data.aboutMe;
        saveAboutMe(aboutMe_original);
    })
}

function saveAboutMe(aboutMe_original){
    document.getElementById("AboutMe_text").innerHTML =
    '<form action="" method="post">'+
    '<textarea name="aboutMe_new" class="aboutMeDiv">'+aboutMe_original+'</textarea><br>'+
    '<div class="row" style"align-items:center;">'+
    '<div class="col-3">'+
    '<input type="submit" name="aboutMe_conf" value="Confirmar" class="btn btn-warning btn-lg active">'+
    '</div><div class="col-3"></div><div class="col-3">'+
    '<input onclick="cancelAboutMe()" type="button" name="aboutMe_cancel" id="aboutMe_cancel" value="Cancelar" class="btn btn-warning btn-lg active">'+
    '</div>'+
    '</div>'+
    '</form>';
}

function cancelAboutMe(){
    document.getElementById("AboutMe_text").innerHTML=aboutMe_original;
}

function loadBooks(){
    fetch('livros.json')
    .then(response => response.json())
    .then(data => {
        newBook=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadBooksBack()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-left icon-big" ></i>'+
        '</button>'+
        '</div>';
        for(let i=0; i<4 ;i++){
            if (i+bookStart < data.length){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i+bookStart].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i+bookStart].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i+bookStart].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
            }
        }
        newBook+=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadBooks()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-right icon-big" ></i>'+
        '</button>'+
        '</div>';

        document.getElementById("myBooks").innerHTML = newBook;

        bookStart += 4;
        if (bookStart >= data.length) {
            bookStart = 0;
        }
    })
    
}

function gotoBook(isbn){
    //AJAX de mandar os dados do livro
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Livro.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('AJAX livro funcionou: ' + xhr.responseText);
        } else {
            console.error('AJAX livro morreu: ' + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('AJAX livro problemas. Verificar.');
    };

    xhr.send('isbn=' + encodeURIComponent(isbn));
    gotoBookLocation();
}

function gotoBookLocation(){
    window.location.href='Livro.php';
}

function getISBN(isbn) {
    const urlISBN = new URLSearchParams(window.location.search);
    return urlISBN.get(isbn);
}

function loadSugestions(){
    fetch('sugestoes.json')
    .then(response => response.json())
    .then(data => {
        newBook=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadSugestionsBack()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-left icon-big" ></i>'+
        '</button>'+
        '</div>';
        for(let i=0; i<5 ;i++){
            if (i+bookStart < data.length){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i+bookStart].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i+bookStart].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i+bookStart].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
            }
        }
        newBook+=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadSugestions()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-right icon-big" ></i>'+
        '</button>'+
        '</div>';

        document.getElementById("sugestions").innerHTML = newBook;

        bookStart += 5;
        if (bookStart >= data.length) {
            bookStart = 0;
        }
    })
    
}

function loadSugestionsBack(){
    bookStart -= 10;
    if (bookStart < 0) {
        bookStart = 0;
    }
    fetch('sugestoes.json')
    .then(response => response.json())
    .then(data => {
        newBook=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadSugestionsBack()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-left icon-big" ></i>'+
        '</button>'+
        '</div>';
        for(let i=0; i<5 ;i++){
            if (i+bookStart < data.length){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i+bookStart].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i+bookStart].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i+bookStart].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
            }
        }
        newBook+=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadSugestions()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-right icon-big" ></i>'+
        '</button>'+
        '</div>';

        document.getElementById("sugestions").innerHTML = newBook;

        bookStart += 5;
        if (bookStart >= data.length) {
            bookStart = 0;
        }
    })
    
}

function loadBooksBack(){
    bookStart -= 8;
    if (bookStart < 0) {
        bookStart = 0;
    }
    fetch('livros.json')
    .then(response => response.json())
    .then(data => {
        newBook=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadBooksBack()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-left icon-big" ></i>'+
        '</button>'+
        '</div>';
        for(let i=0; i<4 ;i++){
            if (i+bookStart < data.length){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i+bookStart].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i+bookStart].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i+bookStart].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
            }
        }
        newBook+=
        '<div class="col-md menu-padding-books menu-padding-buttons align-self-center" style="margin-top: 30px;">'+
        '<button onclick="loadBooks()" class="btn btn-icons btn-outline-dark " type="button" >'+
        '<i class="bi bi-chevron-right icon-big" ></i>'+
        '</button>'+
        '</div>';

        document.getElementById("myBooks").innerHTML = newBook;

        bookStart += 4;
        if (bookStart >= data.length) {
            bookStart = 0;
        }
    })
    
}