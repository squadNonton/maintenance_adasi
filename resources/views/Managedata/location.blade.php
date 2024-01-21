@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Manage Data /</span> Location
</h4>
<div class="card">
    <div class="d-flex justify-content-end flex-sm-row flex-column p-3">
        <button class="btn btn-label-primary me-2 waves-effect" type="button" data-name="add"><i class="ti ti-plus"></i>Add Location</button>
    </div>
    <div class="card-datatable dataTable_select text-nowrap">
        <table class="dt-select-table table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Location Name</th>
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
                        <td>{{$value->name}}</td>
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
                    <h3 class="mb-2">Add Location</h3>
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" value="" data-name="name">
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

{{-- Modal Add --}}
<div class="modal fade" id="modal_edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Edit Location</h3>
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" value="" data-name="edit_name">
                    <input type="hidden" data-name="edit_id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary me-sm-3 me-1" data-name="save_edit">Save</button>
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Add --}}

{{-- JS Add Data --}}
<script>
    $(document).on("click", "[data-name='add']", function (e) {
        $("[data-name='name']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function (e) {
        var name        = $("[data-name='name']").val();
        var is_active   = 1;
        var update_by   = "{!! $idn_user->id !!}";
        var table       = "mst_role";

        var data = {
                name:name,
                is_active: is_active,
                update_by: update_by
            };

        if (name === '') {
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
</script>
{{-- End JS Add Data --}}

{{-- JS Edit Data --}}
<script>
    $(document).on("click", "[data-name='edit']", function (e) {
        var id      = $(this).attr("data-item");
        var table   = 'mst_role';
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

        var table       = "mst_role";
        var whr         = "id";
        var id          = $("[data-name='edit_id']").val();
        var dats        = {name:name};

        if (name === '') {
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

</script>
{{-- End JS Edit Data --}}

{{-- JS Delete Data --}}
<script>
    $(document).on("click", "[data-name='delete']", function (e) {
        var id      = $(this).attr("data-item");
        var table   = 'mst_role';
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

<script>
    $(document).ready(function() {
        $('.dt-select-table').DataTable();
    });
</script>


@stop
