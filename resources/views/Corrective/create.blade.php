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
                            <img src="{{asset('assets/qr/default.png')}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" style="max-width: 5rem">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>C2</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Location</label>
                        <input type="text" class="form-control" id="" value="Deltamas" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Section</label>
                        <input type="text" class="form-control" id="" value="Cutting" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Type</label>
                        <input type="text" class="form-control" id="" value="H 1010" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Machine</label>
                        <input type="email" class="form-control" id="" value="CC-1" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="email" class="form-control" id="" value="1994" disabled>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light w-100">
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
                    <textarea class="form-control" id="" rows="5"></textarea>
                  </div>
                <div class="mb-3">
                    <label for="" class="form-label">Uploade Image</label>
                    <input class="form-control" type="file" id="">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary waves-effect waves-light w-100">
                        <span class="fa-solid fa-qrcode me-3"></span>Create Corrective
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

@stop