</div>
</main>

<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
<script src="assets/vendors/sweetAlert/sweetalert2.all.min.js"></script>

<script>
$('.tmb_hps').on('click', function(e) {
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        icon: 'warning',
        title: 'Apakah anda yakin?',
        text: 'Anda akan menghapus item ini.', 
        showCancelButton: true,
        confirmButtonColor: '#ff0060'
    }).then(function(result) {
        if(result.value) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Item sudah dihapus.', 
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = href
            })
        }
    });
})

$('.reset').on('click', function(e) {
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        icon: 'warning',
        title: 'Apakah anda yakin?',
        text: 'Anda akan mereset ulang keranjang ini.', 
        showCancelButton: true,
        confirmButtonColor: '#ff0060'
    }).then(function(result) {
        if(result.value) {

            window.location.href = href
            
        }    

    });
})

$('.logOut').on('click', function(e) {
    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        icon: 'question',
        title: 'Apakah anda yakin?',
        text: 'Anda akan keluar dari web kasir ini.', 
        showCancelButton: true,
        confirmButtonColor: '#ff0060'
    }).then(function(result) {
        if(result.value) {

            window.location.href = href
            
        }    

    });
})
</script>

</body>
</html>