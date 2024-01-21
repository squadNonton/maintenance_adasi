@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Manage Data /</span> Machine
</h4>
<div class="card">
    <div class="d-flex justify-content-end flex-sm-row flex-column p-3">
        <button class="btn btn-label-primary me-2 waves-effect" type="button" data-name="add"><i class="ti ti-plus"></i>Add Machine</button>
    </div>
    <div class="card-datatable dataTable_select text-nowrap">
        <table class="dt-select-table table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Image</th>
                    <th>QR Code</th>
                    <th>Name</th>
                    <th>No Machine</th>
                    <th>Type</th>
                    <th>Age</th>
                    <th>Section</th>
                    <th>Location</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($arr as $key => $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            <div class="avatar">
                                <img src="{{asset('assets/machine/'.$value->foto)}}" alt="Avatar" class="rounded-circle">
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-primary bg-glow">{{$value->qr_code}}</span>
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->no_machine}}</td>
                        <td>{{$value->type}}</td>
                        <td>{{$value->age}}</td>
                        <td>{{$value->section}}</td>
                        <td>{{$value->location}}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($value->last_update)->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-info waves-effect waves-light me-2" data-name="edit" data-item="{{$value->id}}"><i class="ti ti-pencil"></i></button>
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-name="delete" data-item="{{$value->id}}"><i class="ti ti-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Add Machine</h3>
                </div>

                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{asset('assets/machine/default.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="img_add" />
                    <div class="button-wrapper">
                        <label for="add_mc" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input type="file" id="add_mc" name="add_mc" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            <input type="hidden" id="add_name_foto" data-name="foto">
                        </label>
                        <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" value="" data-name="name">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Type</label>
                    <input type="text" class="form-control" id="" value="" data-name="type">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">No Machine</label>
                    <input type="text" class="form-control" id="" value="" data-name="no_machine">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Age</label>
                    <input type="text" class="form-control" id="" value="" data-name="age">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <select id="" class="select-2-add form-select form-select-lg" data-allow-clear="true" data-name="id_location">
                        <option value="">-- Select Location</option>
                        @foreach($location as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Section</label>
                    <select id="" class="select-2-add form-select form-select-lg" data-allow-clear="true" data-name="id_section">
                        <option value="">-- Select Section</option>
                        @foreach($section as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary me-sm-3 me-1" data-name="save_add">Save</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Add --}}

{{-- Modal Edit --}}
<div class="modal fade" id="modal_edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Edita User</h3>
                </div>

                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{asset('assets/machine/default.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="img_edit" />
                    <div class="button-wrapper">
                        <label for="edit_foto" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input type="file" id="edit_foto" name="edit_foto" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            <input type="hidden" id="edit_name_foto" data-name="edit_foto">
                        </label>
                        <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_name">
                    <input type="hidden" data-name="edit_id">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Type</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_type">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">No Machine</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_no_machine">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Age</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_age">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <select id="" class="select-2-edit form-select form-select-lg" data-allow-clear="true" data-name="edit_id_location">
                        <option value="">-- Select Location</option>
                        @foreach($location as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Section</label>
                    <select id="" class="select-2-edit form-select form-select-lg" data-allow-clear="true" data-name="edit_id_section">
                        <option value="">-- Select Section</option>
                        @foreach($location as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary me-sm-3 me-1" data-name="save_edit">Save</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Edit --}}

{{-- JS Add Data --}}
<script>
    $(document).on("click", "[data-name='add']", function (e) {
        $("[data-name='name']").val('');
        $("[data-name='type']").val('');
        $("[data-name='no_machine']").val('');
        $("[data-name='age']").val('');
        $("[data-name='id_location']").val('').trigger("change");
        $("[data-name='id_section']").val('').trigger("change");
        $("[data-name='foto']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function (e) {

        $.ajax({
            type: "GET",
            url: "{{route('qrgeneratemachine')}}",
            data: {},
            cache: false,
            success: function(data) {
                // console.log(data);

                var qr_code     = data.qrname;
                var name        = $("[data-name='name']").val();
                var type        = $("[data-name='type']").val();
                var no_machine  = $("[data-name='no_machine']").val();
                var age         = $("[data-name='age']").val();
                var id_location = $("[data-name='id_location']").val();
                var id_section  = $("[data-name='id_section']").val();
                var foto        = $("[data-name='foto']").val();
                var is_active   = 1;
                var update_by   = "{!! $idn_user->id !!}";
                var table       = "mst_machine";
                if(foto === ''){
                    var foto    = 'default.png';
                }else{
                    var foto    = $("[data-name='foto']").val();
                }

                var data = {
                    qr_code:qr_code,
                    name:name,
                    type:type,
                    no_machine:no_machine,
                    age:age,
                    id_location:id_location,
                    id_section:id_section,
                    foto:foto,
                    is_active:is_active,
                    update_by:update_by
                };

                if (qr_code === '' || name === '' || type === '' || no_machine === '' || age === '' || id_location === '' || id_section === '') {
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

    });

    $("#add_mc").on("change", function(e){
        var ext = $("#add_mc").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile    = URL.createObjectURL(e.target.files[0]);
            $('#img_add').attr('src', uploadedFile);
            var photo           = e.target.files[0];
            var formData        = new FormData();
            formData.append('add_mc', photo);
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
{{-- End JS Add Data --}}

{{-- JS Edit Data --}}
<script>
    $(document).on("click", "[data-name='edit']", function (e) {
        var id      = $(this).attr("data-item");
        var table   = 'mst_machine';
        var field   = 'id';

        $.ajax({
            type: "POST",
            url: "{{ route('actionshowdata') }}",
            data: {id:id,table:table,field:field},
            cache: false,
            success: function(data) {
                // console.log(data['data']);
                $("[data-name='edit_id']").val(data['data'].id);
                $("[data-name='edit_name']").val(data['data'].name);
                $("[data-name='edit_type']").val(data['data'].type);
                $("[data-name='edit_no_machine']").val(data['data'].no_machine);
                $("[data-name='edit_age']").val(data['data'].age);
                $("[data-name='edit_id_location']").val(data['data'].id_location).trigger("change");
                $("[data-name='edit_id_section']").val(data['data'].id_section).trigger("change");
                $("[data-name='edit_foto']").val(data['data'].foto);
                var show_foto   = "assets/machine/"+data['data'].foto;
                $('#img_edit').attr('src', show_foto);
                $("#modal_edit").modal('show');
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
        
    });

    $(document).on("click", "[data-name='save_edit']", function (e) {
        var name        = $("[data-name='edit_name']").val();
        var type        = $("[data-name='edit_type']").val();
        var no_machine  = $("[data-name='edit_no_machine']").val();
        var age         = $("[data-name='edit_age']").val();
        var id_location = $("[data-name='edit_id_location']").val();
        var id_section  = $("[data-name='edit_id_section']").val();
        var foto        = $("[data-name='edit_foto']").val();
        if(foto === ''){
            var foto    = 'default.jpg';
        }else{
            var foto    = $("[data-name='edit_foto']").val();
        }

        var table       = "mst_machine";
        var whr         = "id";
        var id          = $("[data-name='edit_id']").val();
        var dats        = {
            name:name,
            type:type,
            no_machine:no_machine,
            age:age,
            id_location:id_location,
            id_section:id_section,
            foto:foto,
        };

        if (name === '' || type === '' || no_machine === '' || age === '' || id_location === '' || id_section === '') {
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
                url: "{{ route('actionedit') }}",
                data: {id:id,whr:whr,table:table,dats:dats},
                cache: false,
                success: function(data) {
                    // console.log(data);
                    $("#modal_edit").modal('hide');
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

    $("#edit_foto").on("change", function(e){
        var ext = $("#edit_foto").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile    = URL.createObjectURL(e.target.files[0]);
            $('#img_edit').attr('src', uploadedFile);
            var photo           = e.target.files[0];
            var formData        = new FormData();
            formData.append('add_mc', photo);
            $.ajax({
                url: "{{route('upload_profile')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    // console.log(res);
                    $('#edit_name_foto').val(res);
                }
            })

        }
    });
</script>
{{-- End JS Edit Data --}}

{{-- JS Delete Data --}}
<script>
    $(document).on("click", "[data-name='delete']", function (e) {
        var id      = $(this).attr("data-item");
        var table   = 'mst_machine';
        var whr     = 'id';

        Swal.fire({
            title: 'Anda yakin?',
            text: 'Aksi ini tidak dapat diulang!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('actiondelete') }}",
                    data: {id:id,whr:whr,table:table},
                    cache: false,
                    success: function(data) {
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
        })
    });
</script>
{{-- End JS Delete Data --}}

{{-- Select2 --}}
<script>
    $(".select-2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_add")
    });

    $(".select-2-edit").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_edit")
    });
</script>
{{-- End Select2 --}}

<script>
    $(document).ready(function() {
        $('.dt-select-table').DataTable();
    });
</script>

@stop
