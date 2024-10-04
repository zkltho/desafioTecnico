@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">Usuarios</span>

                             <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">Nuevo</a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >First Name</th>
									<th >Last Name</th>
									<th >Age</th>
									<th >Gender</th>
									<th >Email</th>
									<th >Country</th>
									<th >City</th>
									<th >Picture Large</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $usuario->first_name }}</td>
										<td >{{ $usuario->last_name }}</td>
										<td >{{ $usuario->age }}</td>
										<td >{{ $usuario->gender }}</td>
										<td >{{ $usuario->email }}</td>
										<td >{{ $usuario->country }}</td>
										<td >{{ $usuario->city }}</td>
										<td >{{ $usuario->picture_large }}</td>

                                            <td>
                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show', $usuario->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Esta seguro que desea eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $usuarios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
