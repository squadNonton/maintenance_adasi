@extends('main')
@section('content')

    <h4 class="py-3 mb-3">
        <span class="text-muted fw-light">Sales /</span> History View
    </h4>
    <div class="card">
        <div class="card-datatable dataTable_select text-nowrap">
            <table class="dt-select-table table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Tiket</th>
                        <th>Mesin</th>
                        <th>Section</th>
                        <th>Location</th>
                        <th>Kendala</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>FPP-001</td>
                        <td>C1</td>
                        <td>Cutting</td>
                        <td>Deltamas</td>
                        <td>Mesin Rusak</td>
                        <td>
                            <button type="submit" class="btn btn-danger deactivate-account btn-sm">Deactivate
                                Account</button>
                        </td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    {{-- @php
                        $no = 1;
                    @endphp
                    @foreach ($arr as $key => $value)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->pic_name }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($value->date_create)->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}
                            </td>
                            <td>{{ $value->section }}</td>
                            <td>{{ $value->mc_type }}</td>
                            <td>{{ $value->mc_name }}</td>
                            <td>{{ $value->location }}</td>
                            <td>
                                <span class="badge rounded-pill bg-label-{{ $value->st_color }}">{{ $value->st_name }}</span>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.dt-select-table').DataTable();
        });
    </script>

@stop
