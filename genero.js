var newGenero="";

document.addEventListener('DOMContentLoaded', function() {
    getGeneros();
});

function getGeneros() {
    fetch('generos.json')
    .then(response => response.json())
    .then(info => {
        var generoArray = info;
        console.log(generoArray);
        loadGeneros(generoArray);
    })
    
}

function loadGeneros(gA) {
    fetch('livros.json')
    .then(response => response.json())
    .then(data => {
        for (let j = 0; j < gA.length; j++) {
            newGenero+=
            '<h2 style="margin-top:30px;">'+gA[j].nome+'</h2>'+
            '<div class="row justify-content-center">';
            for(let i=0; i<data.length ;i++){
                console.log(data[i].nome+' '+data[i].idGenero);
                if(data[i].idGenero==gA[j].idGenero){
                    newGenero+=
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
            newGenero+=
            '</div>';
            console.log("Primeiro:"+newGenero);
        }
        
        
        document.getElementById("generos").innerHTML = newGenero;
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