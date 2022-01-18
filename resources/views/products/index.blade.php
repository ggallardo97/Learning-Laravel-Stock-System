@extends('layouts.main')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        <a href="{{route('products.create')}}" style="float: right" class="btn btn-success btn-sm">Nuevo Producto</a>
                    </div>
                    <div class="card-body">
                       @if(session('info'))
                            <div class="alert alert-success">{{session('info')}}</div>
                       @endif
                       <table class="table table-hover table-sm">
                           <thead>
                               <th>
                                   Descripcion
                               </th>
                               <th>
                                   Precio
                               </th>
                               <th>
                                   Accion
                               </th>
                           </thead>
                           <tbody>
                               @foreach($products as $prods)
                               <tr>
                                   <td>
                                        {{$prods['description']}}
                                   </td>
                                   <td>
                                        {{$prods['price']}}
                                   </td>
                                   <td>
                                        <a href="javascript: document.getElementById('delete-{{$prods['id']}}').submit()" class="btn btn-danger btn-m"><i class='fa fa-trash'></i></a>
                                        <a href="{{route('products.change',$prods['id'])}}" class="btn btn-primary btn-m"><i class='fa fa-edit'></i></a>
                                        <form id="delete-{{$prods['id']}}" action="{{route('products.destroy',$prods['id'])}}" method="post">
                                            @method('delete')
                                            @csrf
                                        </form>
                                        <form id="put-{{$prods['id']}}" action="{{route('products.change',$prods['id'])}}" method="post">
                                            @method('put')
                                            @csrf
                                        </form>
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>

                       </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido {{auth()->user()->name}}
                        <a href="javascript: document.getElementById('logout').submit()" style="float:right" class="btn btn-danger btn-sm">Cerrar Sesion</a>
                        <form method="post" action="{{route('logout')}}" id="logout" style="display:none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection