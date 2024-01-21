@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Corrective /</span> Create Corrective
</h4>
<div class="row">
    <div class="col-xl-4 col-lg-12 col-md-12 mb-4">
        <div class="card">
            <h5 class="card-header">Machine Information</h5>
            <div class="card-body">
                <div class="card mb-4 p-3">
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{asset('assets/qr/default.png')}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="max-width: 5rem" id="img_show">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 data-name="name">-</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Location</label>
                        <input type="text" class="form-control" id="" value="-" data-name="location" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Section</label>
                        <input type="text" class="form-control" id="" value="-" data-name="section" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Type</label>
                        <input type="text" class="form-control" id="" value="-" data-name="type" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Machine</label>
                        <input type="text" class="form-control" id="" value="-" data-name="no_machine" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="text" class="form-control" id="" value="-" data-name="age" disabled>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light w-100" data-name="show_scane">
                            <span class="fa-solid fa-qrcode me-3"></span>Scane QR Machine
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-12 col-md-12 mb-4">
        <div class="card">
            <h5 class="card-header">Corrective Information</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Constraint</label>
                    <textarea class="form-control" id="" rows="5" data-name="constraint"></textarea>
                    <input type="hidden" data-name="id_machine">
                  </div>
                <div class="mb-3">
                    <label for="" class="form-label">Uploade Image</label>
                    <input class="form-control" type="file" id="add_image">
                    <input type="hidden" id="add_name_foto" data-name="foto">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary waves-effect waves-light w-100" data-name="create">
                        <span class="fa-solid fa-file me-3"></span>Create Corrective Tes
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Modal Add --}}
<div class="modal fade" id="modal_scane" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Scane QR Code Machine</h3>
                </div>

                <div class="w-100 rounded mb-3">
                    <div id="qr_reader"></div>
                    {{-- <audio id="successSound" src="{{asset('assets/suarscane.mp3')}}"></audio> --}}
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" id="qr_code" value="-" data-name="qr_code" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary me-sm-3 me-1" data-name="show">Show</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Add --}}

{{-- JS Scane QR --}}
<script>
    $(document).on("click", "[data-name='show_scane']", function (e) {
        $("#modal_scane").modal('show');
    });

    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete" || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        // var resultContainer = document.getElementById('qr_reader_results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            // document.getElementById("successSound").play();
            $('#qr_code').val(decodedText);
            showdatamachine(decodedText)
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr_reader", { fps: 10, qrbox: 200 });
        html5QrcodeScanner.render(onScanSuccess);
    });

    function showdatamachine(qrcode){
        var id      = qrcode;
        var table   = 'mst_machine';
        var field   = 'qr_code';

        $.ajax({
            type: "POST",
            url: "{{route('actionshowdata')}}",
            data: {id:id,table:table,field:field},
            cache: false,
            success: function(data) {
                // console.log(data['data']);
                $("[data-name='id_machine']").val(data['data'].id);
                $("[data-name='name']").text(data['data'].qr_code);
                $("[data-name='type']").val(data['data'].type);
                $("[data-name='no_machine']").val(data['data'].no_machine);
                $("[data-name='age']").val(data['data'].age);
                // $("[data-name='location']").val(data['data'].id_location);
                // $("[data-name='section']").val(data['data'].id_section);
                var show_foto   = "assets/qr/"+data['data'].qr_code+".svg";
                $('#img_show').attr('src', show_foto);

                var location    = data['data'].id_location;
                var section     = data['data'].id_section;

                $.ajax({
                    type: "POST",
                    url: "{{route('actionshowdata')}}",
                    data: {id:location,table:'mst_location',field:'id'},
                    cache: false,
                    success: function(data) {
                        $("[data-name='location']").val(data['data'].name);

                        $.ajax({
                            type: "POST",
                            url: "{{route('actionshowdata')}}",
                            data: {id:section,table:'mst_section',field:'id'},
                            cache: false,
                            success: function(data) {
                                $("[data-name='section']").val(data['data'].name);
                                $("#modal_scane").modal('hide');
                            },            
                            error: function (data) {
                                Swal.fire({
                                    position:'center',
                                    title: 'Action Not Valid!',
                                    icon: 'warning',
                                    showConfirmButton: true,
                                    // timer: 1500
                                }).then((data) => {
                                    // location.reload();
                                })
                            }
                        });
                    },            
                    error: function (data) {
                        Swal.fire({
                            position:'center',
                            title: 'Action Not Valid!',
                            icon: 'warning',
                            showConfirmButton: true,
                            // timer: 1500
                        }).then((data) => {
                            // location.reload();
                        })
                    }
                });
            },            
            error: function (data) {
                Swal.fire({
                    position:'center',
                    title: 'Action Not Valid!',
                    icon: 'warning',
                    showConfirmButton: true,
                    // timer: 1500
                }).then((data) => {
                    // location.reload();
                })
            }
        });
        

    }
</script>
{{-- End JS Scane QR --}}

{{-- JS Create Corrective --}}
<script>
    $(document).on("click", "[data-name='create']", function (e) {
        var id_machine  = $("[data-name='id_machine']").val();
        var foto        = $("[data-name='foto']").val();
        var constraint  = $("[data-name='constraint']").val();
        var id_status   = $("[data-name='id_status']").val();
        var id_user     = "{!! $idn_user->id !!}";
        var date_create = moment().format('Y-MM-DD H:mm:ss');
        var table       = "trx_corrective";

        var data = {
                id_machine:id_machine,
                foto:foto,
                constraint:constraint,
                id_user:id_user,
                date_create:date_create,
                id_status:id_status
            };

        if (id_machine === '') {
            Swal.fire({
                position:'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        }else{
            $.ajax({
                type: "POST",
                url: "{{ route('actionadd') }}",
                data: {table: table, data: data},
                cache: false,
                success: function(data) {
                    // console.log(data);
                    $("#modal_add").modal('hide');
                    Swal.fire({
                        position:'center',
                        title: 'Success!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((data) => {
                        location.reload();
                    })
                },            
                error: function (data) {
                    Swal.fire({
                        position:'center',
                        title: 'Action Not Valid!',
                        icon: 'warning',
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((data) => {
                        // location.reload();
                    })
                }
            });
        }

    });

    $("#add_image").on("change", function(e){
        var ext = $("#add_image").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile    = URL.createObjectURL(e.target.files[0]);
            // $('#img_add').attr('src', uploadedFile);
            var photo           = e.target.files[0];
            var formData        = new FormData();
            formData.append('add_image', photo);
            $.ajax({
                url: "{{route('upload_profile')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log(res);
                    $('#add_name_foto').val(res);
                }
            })

        }
    });
</script>
{{-- JS End Create Corrective --}}

@stop