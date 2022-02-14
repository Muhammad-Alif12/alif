var nameInput = document.getElementById('name');
var nikInput = document.getElementById('nik');
var jenisInput = document.getElementById('jenis-layanan');
var fileName = document.getElementById('myFile');


document.querySelector('form#layanan-umum').addEventListener('submit', function (e) {

    e.preventDefault();

    console.log(nameInput.value);
    console.log(nikInput.value);   
    console.log(jenisInput.value); 
    console.log(fileName.value);

  
 
});