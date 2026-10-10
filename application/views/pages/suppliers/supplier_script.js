$('.btn-delete-id').click(function(){
    var ID = $(this).data('id');
    $('#confirm_delete_btn').attr('data-id', ID);
});

$('#confirm_delete_btn').click(function(){
    var ID = $(this).attr('data-id');
    if(ID){
        $.ajax({
            url: '<?= site_url("suppliers/delete") ?>/' + ID,
            type: 'POST',
            dataType: 'json',

            success: function (response) {
                if (response.status === 'success') {
                    $('#confirm_delete_modal').modal('hide');
                    location.reload();
                }
            },

            error: function (xhr, status, error) {
                console.log('HTTP status:', xhr.status);
                console.log('AJAX status:', status);
                console.log('Error:', error);
                console.log('Server response:', xhr.responseText);

                alert('Gagal menghapus supplier. Periksa Console.');
            }
        });
    }
});