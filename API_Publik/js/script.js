// $('#search-button').on('click', function(){
    //     console.log('ok');
    // })
    
function searchMovie() {
    // kosongkan terlebih dahulu id=movie-list
    $('#movie-list').html('');
        
    // fungsi ajax untuk API
    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : 'dca61bcc',
            's' : $('#search-input').val()
        },
        // kalau sukses, maka jalankan fungsi dibawah ini
        success: function (result) {
            if ( result.Response == 'True' ){ // kalau responsenya true, maka jalankan fungsi dibawahnya
    
                let movie = result.Search;
                $.each(movie, function(i, data) {
                    $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img src="` + data.Poster + `" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">`+ data.Title +`</h5>
                                <p class="card-text text-muted">`+ data.Year +`</p>
                                <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="`+ data.imdbID +`">See Detail</a>
                        </div>
                        </div>
                        </div>
                    `)
                });
        
            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">` + result.Error + `</h1>
                    </div>
                `)
            }
        
        // kosong value dari field inputnya
        $('#search-input').val('');
        }
    });
// akhir fungsi searchMovie
}

// kalau button dengan id=search-button diklik maka jalankan fungsi dibawah
$('#search-button').on('click', function () {
    searchMovie();
});

// jalankan fungsi kalau tombol enter ditekan
$('#search-input').on('keyup', function (e) { // ada parameternya, antara e/event
    if ( e.keyCode === 13 ) { // 13 merupakan keycode dari tombol enter, info keycode.info
        searchMovie();
    }
});

// cara bacanya (DOM)
// jquery carikan element/id=movie-list, lalu kalau ada class=see-detail diklik makan jalankan fungsi dibawah (DOM)
$('#movie-list').on('click', '.see-detail', function () {
    
    // fungsi ajax untuk API
    $.ajax({
        url: 'http://www.omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : 'dca61bcc',
            'i' : $(this).data('id')
        },
        // kalau sukses, maka jalankan fungsi dibawah ini
        success: function (movie) {
            if ( movie.Response == 'True' ){ // kalau responsenya true, maka jalankan fungsi dibawahnya
    
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster +`" class="img-fluid">
                            </div>    

                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item font-weight-bold"><h3>`+ movie.Title +`</h3></li>
                                    <li class="list-group-item text-muted">Released : `+ movie.Released +`</li>
                                    <li class="list-group-item">Genre :  `+ movie.Genre +`</li>
                                    <li class="list-group-item">Director : `+ movie.Director +`</li>
                                    <li class="list-group-item">Actors : `+ movie.Actors +`</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `);

            } 
        }
    })

});