@extends('layouts.master')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h6 class="card-title font-weight-bold">
            APERTURA DE CAJA
        </h6>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('administrar-caja.abrir-caja')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-form-label col-form-label-sm mb-1 font-weight-bold col-md-3">Monto Inicial</label>
                        <div class="col-md-6 mb-1">
                            <input type="text" name="monto_inicial" class="form-control form-control-sm @error('monto_inicial') is-invalid @enderror"
                                value="{{ old('monto_inicial') }}"/>
                            @error('monto_inicial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-md-12 mb-1">
                            <button type="submit" class="btn btn-success btn-sm me-1">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                            <a href="{{ route('administrar-caja.index')}}" class="btn btn-danger btn-sm ">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
