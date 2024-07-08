var newBook="";

document.addEventListener('DOMContentLoaded', function() {
    loadBooks();
    loadFavourites();
});

function loadBooks(){
    fetch('livros.json')
    .then(response => response.json())
    .then(data => {
        for(let i=0; i<data.length ;i++){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
        }
        document.getElementById("livros").innerHTML = newBook;
    })
}

function loadFavourites(){
    fetch('livros.json')
    .then(response => response.json())
    .then(data => {
        newBook="";
        for(let i=0; i<data.length ;i++){
            if(data[i].isFavourite==1){
                newBook+=
                '<div class="col-md" style="margin-top: 30px;">'+
                '<div class="card" style="width: 8rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;" onclick="gotoBook('+data[i].isbn+')">'+
                '<form method="post">'+
                '<img src="https://covers.openlibrary.org/b/isbn/'+data[i].isbn+'-M.jpg" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                '<h5 class="card-title" >'+data[i].nome+'</h5>'+
                '</div>'+
                '</form>'+
                '</div>'+
                '</div>';
            }
        }
        document.getElementById("favoritos").innerHTML = newBook;
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