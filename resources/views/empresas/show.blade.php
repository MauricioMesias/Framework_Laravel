@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Ver Empresas</h5>
            <a href="{{ route('empresas.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('empresas.store')}}" method="POST" enctype="multipart/form-data" id="create">
            @include('empresas.partials.form')
            </form>
        </div>
        <div class="card-footer">          
        </div>
    </div>
@endsection
