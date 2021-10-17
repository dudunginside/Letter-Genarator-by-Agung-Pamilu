@extends('layouts.master')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                              <h4 class="text-center">Letter Generator</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="fname">Nama Pengirim</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                                </div>
    
                                <div class="form-group">
                                    <label for="lname">Subject</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                                </div>
    

                                <div class="form-group">
                                    <label for="text">Isi Surat</label>
                                    <input type="text" name="text" id="email" class="form-control" placeholder="Masukan Isi">
                                </div>
    
    
                              <button type="submit" class="btn btn-dark btn-block" id="save_form">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





@push('javascript')
<script>
        $(document).ready(function() {
            $('#save_form').on('click', function(e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
    
                $.ajax({
                    type: 'POST',
                    url: 'save_customer',
                    data: {
                        '_token': '<?= csrf_token() ?>',
                        email: email,
                        fname: fname,
                        lname: lname,
                    },
                    success:function(data) {
                    $('[name="fname"]').val('');
                    $('[name="lname"]').val('');
                    $('[name="email"]').val('');
                    if (data.success) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Letter Generated.');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                 
                } else {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('An error occured. Please try later');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
                $(this).text('Save');
                $(this).removeAttr('disabled');
                 }.bind($(this))
                });
            });
        });
    </script>
@endpush