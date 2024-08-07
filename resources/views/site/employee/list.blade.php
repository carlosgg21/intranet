@extends('layouts.app-site')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <table class="table table-striped table-sm" style="font-size: small">
            <thead class="thead-dark">
                <tr>
                    <th>NOMBRE</th>
                    <th>CARGO</th>
                    <th>ÁREA</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>TELEFÓNO</th>
                    <th>FECHA DE CONTRATACIÓN</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>
                            <small>{{ $employee->identification }}</small><br>
                            {{ $employee->full_name }}
                         </td>
                         <td>{{ $employee->charge?->name }}</td>
                         <td>{{ $employee->area?->name }}</td>
                         <td>{{ $employee->email }}</td>
                         <td>{{ $employee->phone }}</td>
                         <td>{{ $employee->hiring_date ? format_date($employee->hiring_date,'d/m/Y') : "-" }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>


    </div>

</div>
@endsection