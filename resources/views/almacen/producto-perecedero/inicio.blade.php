@extends('layouts.master')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h6 class="card-title">
            Listado de Productos Perecederos
        </h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-1">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                {{-- <th>Categoría</th> --}}
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Vence</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as  $producto)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $producto->precio }}</td>
                                <td class="text-center">{{ $producto->cantidad }}</td>
                                <td class="text-center">
                                    @if($producto->cantidad > 5)
                                    <span class="badge bg-success">Vigente</span>
                                    @elseif ($producto->cantidad >=1 && $producto->cantidad <5)
                                    <span class="badge bg-info text-dark">Por Agotarse</span>
                                    @elseif ($producto->cantidad == 0)
                                    <span class="badge bg-danger">Cant. Agotada</span>
                                    @endif
                                </td>
                                <td>
                                    <a  class="btn btn-sm btn-warning" href="{{ route("productos.edit",$producto) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- <a  class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <form id="delete-form" action="{{ route('producto.destroy',$producto) }}" method="POST" role="form" onsubmit="return confirmarEliminar()">
                                        @method('DELETE')
                                        @csrf
                                    </form> --}}
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center tex-danger table-danger" colspan="5"> --Datos no registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
