function AddBook(){
    isbn = document.getElementById("isbn").value;
    fetch('https://openlibrary.org/isbn/'+isbn+'.json')
    .then((result) => result.json())
    .then ((response) => {
        console.log(response);
        nome=response.title;
        editora=response.publishers[0];
        
    })
}