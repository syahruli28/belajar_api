// catatan
// $.getJSON('datanya', function (hasilnya wajib) {});
// lalu, $.each(menu, function (jumlah index = i, hasil wajib sebelumnya){});

// fungsi tampilkanSemuaMenu
function tampilkanSemuaMenu() {
    $('#daftar-menu').html('');
    $.getJSON('data/pizza.json', function(data){
        let menu = data.menu;
        $.each(menu, function (i, data){
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><p class="card-text text-muted">Rp. ' + data.harga + '</p><a href="#" class="btn btn-primary">Beli Sekarang</a></div></div></div>');
        });
    });    
}

// tampilkan fungsi tampilkanSemuaMenu()
tampilkanSemuaMenu();

// menjalankan sebuah fungsi disaat link diklik
$('.nav-link').on('click', function (){
    $('.nav-link').removeClass('active'); // untuk menghilangkan dan class active.
    $(this).addClass('active');

    // ubah isi h1 sesuai dengan link yang diklik
    let kategori = $(this).html();
    $('h1').html(kategori);

    if ( kategori == 'All Menu' ) {
        tampilkanSemuaMenu();
        return; // agar fungsi dibawahnya tidak dijalankan / agar keluar dari fungsinya langsung
    }

    // jalankan fungsi json 
    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu; // buat variabel menu lalu masuk ke bagian data lalu ke properti 'menu'
        let konten = '';

        // keluarkan semua isi variabel menu
        $.each(menu, function (i, data) {
            if ( data.kategori == kategori.toLowerCase()){
                konten += '<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><p class="card-text text-muted">Rp. ' + data.harga + '</p><a href="#" class="btn btn-primary">Beli Sekarang</a></div></div></div>'
            }
        });
        // buat id daftar-menu berisi konten
        $('#daftar-menu').html(konten);
    });


});