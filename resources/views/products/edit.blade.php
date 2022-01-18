@extends('layouts.main')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Producto
                    </div>
                    <div class="card-body">
                       <form method="post" action="{{route('products.edit',$product['id'])}}">
                           @method('put')
                           @csrf <!--Genera un token que usa laravel para validar al cliente -->
                           <div class="form-group">
                               <label for="description">Descripcion</label>
                               <input type="text" class="form-control" name="description" value="{{$product['description']}}">
                            </div>
                            <div class="form-group">
                               <label for="price">Precio</label>
                               <input type="number" min="1" class="form-control" name="price" value="{{$product['price']}}">
                            </div>
                            <div style="margin-top:15px">
                               <button type="submit" class="btn btn-primary">Editar</button>
                                <a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a> 
                            </div>
                            
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection