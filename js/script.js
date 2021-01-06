// console.log('ok');

// ambil elemen2 yang di butuhkan 
var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// kita akan menjalnkan ajax pada saat aksi (event)
// tombolcari.addEventListener('mouseover', function () {
//     alert('Ini adalah aksi atau event dari js');
// });

keyword.addEventListener('keyup', function () {
    // console.log(keyword.value)

    // buat object ajax (variable biasanya xhr/ajax)
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax nya
    xhr.onreadystatechange = function () {
        // kalau 4 berarti sumbernya sudah ready & 200 status sumbernya ok web kek 404 dll
        if (xhr.readyState == 4 && xhr.status == 200) {
            // cek debugging js 
            // console.log('ajax ok !'); -> diganti menjadi responetect buat ngambil dari sumber
            // console.log(xhr.responseText);

            // innerHTML apapun yang ada dalam txt/php/dll
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax 
    // open -> membuka koneksi ajax dengan file txt/php dll
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    // fungsi menjalannkan ajax
    xhr.send();









});