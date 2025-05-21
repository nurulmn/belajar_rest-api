// let mahasiswa = {
//     nama : "nurul masya nabila",
//     nim :"2217020016",
//     email : "nmasyanabila@gmail.com"
// }

// console.log(mahasiswa);

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

$.getJSON('coba.json', function(data){
    console.log(data);
}
);
