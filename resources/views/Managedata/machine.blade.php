@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Corrective /</span> Action Corrective
</h4>
<div class="card">
    <div class="card-datatable dataTable_select text-nowrap">
        <table class="dt-select-table table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PIC Prod</th>
                    <th>Datetime</th>
                    <th>Section</th>
                    <th>Type</th>
                    <th>Machine Name</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 1; $i < 100; $i++)
                    <tr>
                        <td>{{$i}}</td>
                        <td>Mugi Pram</td>
                        <td>Sabtu, 20 Januari 2024 18:00</td>
                        <td>Cutting</td>
                        <td>H1010</td>
                        <td>CC2</td>
                        <td>Deltamas</td>
                        <td>
                            <span class="badge rounded-pill bg-label-primary">Draft</span>
                        </td>
                        <td></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
@stop
