@extends('inicio.template')

@section('content')

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
      
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-10">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">EDITAR PRODUCTOS</h1>
              </div>
              <form action="{{route('productos.update', $productoRow->id)}}" method="post">
              @csrf
              @method('put')
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>CODIGO</label>
                    <input type="text" name="codigo" class="form-control" value="{{$productoRow->codigo}}">
                  </div>
                  <div class="col-sm-6">
                    <label>NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" value="{{$productoRow->nombre}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>DESCRIPCION</label>
                    <input type="text" name="descripcion" class="form-control" value="{{$productoRow->descripcion}}">
                  </div>
                  <div class="col-sm-6">
                  <label>MARCA</label>
                  <input type="text" name="marca" class="form-control" placeholder="escriba el correo electronico" required="" value="{{$productoRow->marca}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>CATEGORIA</label>
                    <select name="id_categoria" class="form-control">
                    @foreach($categoriaRows as $row)
                    <option value="{{ $row->id }}" {{ ($row->id == $productoRow->id_categoria) ? 'selected' : ''}}>{{ $row->nombre }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="col-sm-6">
                  <label>PRECIO</label>
                  <input type="number" name="precio" class="form-control" placeholder="escriba el correo electronico" required="" value="{{$productoRow->precio}}">
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$productoRow->id}}">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection