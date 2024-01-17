
<script src="{{ asset('js/jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
    
    $('#showModal').click(function(){
        $('.modal').modal('show');
    });
    $('.borrow').click(function(){
        $id = $(this).data('id');
        $material = $(this).data('material');
        $action = $('#form').attr('action', '/confirm/borrow/' + $material);
        $('#id').val($id);
        $change = `<div class="form-floating mb-3">
                        <input class="form-control" id="volume_number" type="text" placeholder="Volume Number" name="volume_number" disabled/>
                        <label for="volume_number">Volume Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="issue_number" type="text" placeholder="Issue Number" name="issue_number" disabled/>
                        <label for="issue_number">Issue Number</label>
                    </div>`;
        $.ajax({
            type: "get",
            url: "/borrow/"+$material+"/"+$id,
            dataType: "json",
            success: function (response) {
                if ($material == 'book' || $material == 'theses') {
                    $('#title').val(response.title);
                    $('#author').val(response.author);
                    $('#call_number').val(response.call_number);
                    $('.modal').modal('show');
                } else if($material == 'periodical'){
                    $('#change').html($change);
                    $('#title').val(response.title);
                    $('#volume_number').val(response.volume_number);
                    $('#issue_number').val(response.issue_number);
                    $('.modal').modal('show');
                }
                
            }
        });
        
    });
    
    $('#datatablesSimple').DataTable();
    $(document).ready(function(){
        $role = 1;
        if($role == 1){
            $('.sidebar').css('display', 'block');
        }
        else if($role == 2){
            $('#materials').css('display', 'block');
        }
        else if($role == 3){
            $('#core').css('display', 'block');
        }
        var myToast = new bootstrap.Toast(document.getElementById('myToast'));

        // Show the toast
        myToast.show();
    });
    
</script>
</body>
</html>
