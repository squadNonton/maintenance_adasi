@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Manage Data /</span> Users
</h4>
<div class="card">
    <div class="d-flex justify-content-end flex-sm-row flex-column p-3">
        <button class="btn btn-label-primary me-2 waves-effect" type="button" data-name="add"><i class="ti ti-plus"></i>Add Users</button>
    </div>
    <div class="card-datatable dataTable_select text-nowrap">
        <table class="dt-select-table table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>No TLP</th>
                    <th>Email</th>
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
                            @if($value->status == 1)
                                <div class="avatar me-2 avatar-online">
                                    <img src="{{asset('assets/profiles/'.$value->foto)}}" alt="Avatar" class="rounded-circle">
                                </div>
                            @else
                                <div class="avatar me-2 avatar-offline">
                                    <img src="{{asset('assets/profiles/'.$value->foto)}}" alt="Avatar" class="rounded-circle">
                                </div>
                            @endif
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->level}}</td>
                        <td>{{$value->username}}</td>
                        <td>*** *** ***</td>
                        <td>{{$value->no_tlp}}</td>
                        <td>{{$value->email}}</td>
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
                    <h3 class="mb-2">Add User</h3>
                </div>

                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{asset('assets/profiles/default.jpg')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="img_add" />
                    <div class="button-wrapper">
                        <label for="add_foto" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input type="file" id="add_foto" name="add_foto" class="account-file-input" hidden accept="image/png, image/jpeg" />
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
                    <label for="" class="form-label">No Tlp</label>
                    <input type="text" class="form-control" id="" value="" data-name="no_tlp">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="" value="" data-name="email">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" id="" value="" data-name="username">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" id="" value="" data-name="password">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select id="" class="select-2-add form-select form-select-lg" data-allow-clear="true" data-name="role_id">
                        <option value="">-- Select Role</option>
                        @foreach($role as $key => $value)
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
                    <img src="{{asset('assets/profiles/default.jpg')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="img_edit" />
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
                    <label for="" class="form-label">No Tlp</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_no_tlp">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_email">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_username">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" id="" value="" data-name="edit_password">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select id="" class="select-2-add form-select form-select-lg" data-allow-clear="true" data-name="edit_role_id">
                        <option value="">-- Select Role</option>
                        @foreach($role as $key => $value)
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
        $("[data-name='no_tlp']").val('');
        $("[data-name='email']").val('');
        $("[data-name='username']").val('');
        $("[data-name='password']").val('');
        $("[data-name='role_id']").val('').trigger("change");
        $("[data-name='foto']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function (e) {
        var name        = $("[data-name='name']").val();
        var no_tlp      = $("[data-name='no_tlp']").val();
        var email       = $("[data-name='email']").val();
        var username    = $("[data-name='username']").val();
        var password    = $("[data-name='password']").val();
        var role_id     = $("[data-name='role_id']").val();
        var foto        = $("[data-name='foto']").val();
        var is_active   = 1;
        var update_by   = 1;
        var table       = "users";
        if(foto === ''){
            var foto    = 'default.jpg';
        }else{
            var foto    = $("[data-name='foto']").val();
        }

        var data = {
                name:name,
                no_tlp:no_tlp,
                email:email,
                username:username,
                password:password,
                role_id:role_id,
                foto:foto,
                is_active: is_active,
                update_by: update_by
            };

        if (name === '' || no_tlp === '' || email === '' || username === '' || password === '' || role_id === '') {
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

    $("#add_foto").on("change", function(e){
        var ext = $("#add_foto").val().split('.').pop().toLowerCase();
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
            formData.append('add_foto', photo);
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
        var table   = 'users';
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
                $("[data-name='edit_no_tlp']").val(data['data'].no_tlp);
                $("[data-name='edit_email']").val(data['data'].email);
                $("[data-name='edit_username']").val(data['data'].username);
                $("[data-name='edit_password']").val(data['data'].pass);
                $("[data-name='edit_role_id']").val(data['data'].role_id).trigger("change");
                $("[data-name='edit_foto']").val(data['data'].foto);
                var show_foto   = "assets/profiles/"+data['data'].foto;
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
        var no_tlp      = $("[data-name='edit_no_tlp']").val();
        var email       = $("[data-name='edit_email']").val();
        var username    = $("[data-name='edit_username']").val();
        var password    = $("[data-name='edit_password']").val();
        var role_id     = $("[data-name='edit_role_id']").val();
        var foto        = $("[data-name='edit_foto']").val();
        if(foto === ''){
            var foto    = 'default.jpg';
        }else{
            var foto    = $("[data-name='edit_foto']").val();
        }

        var table       = "users";
        var whr         = "id";
        var id          = $("[data-name='edit_id']").val();
        var dats        = {name:name,no_tlp:no_tlp,email:email,username:username,password:password,role_id:role_id,foto:foto};

        if (name === '' || no_tlp === '' || email === '' || username === '' || password === '' || role_id === '') {
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
            formData.append('add_foto', photo);
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
        var table   = 'users';
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
