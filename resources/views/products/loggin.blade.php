@extends('layouts.main')
@section('content')
<div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesion
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-danger">{{session('info')}}</div>
                        @endif
                       <form method="post" action="{{route('products.loggin')}}">
                           @csrf <!--Genera un token que usa laravel para validar al cliente -->
                           <div class="form-group">
                               <label for="email">Email</label>
                               <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                               <label for="password">Contraseña</label>
                               <input type="password" class="form-control" name="password">
                            </div>
                            <div style="margin-top:15px">
                               <button type="submit" class="btn btn-primary">Loggin</button>
                            </div>
                            
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection