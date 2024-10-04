@extends('layouts.app')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">Ver Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>First Name:</strong>
                                    {{ $usuario->first_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Last Name:</strong>
                                    {{ $usuario->last_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Age:</strong>
                                    {{ $usuario->age }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gender:</strong>
                                    {{ $usuario->gender }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $usuario->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Country:</strong>
                                    {{ $usuario->country }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>City:</strong>
                                    {{ $usuario->city }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Picture Large:</strong>
                                    <a href="{{ $usuario->picture_large }}" target="_blank">{{ $usuario->picture_large }}</a> 
                                    <br>
                                    <img src="{{ $usuario->picture_large }}" alt="Imagen" width="150">
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
