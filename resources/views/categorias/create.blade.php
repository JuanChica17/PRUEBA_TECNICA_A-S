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
                <h1 class="h4 text-gray-900 mb-4">REGISTRAR CATEGORIAS</h1>
              </div>
              <form action="{{route('categorias.store')}}" method="post">
              @csrf
              @method('post')
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>CODIGO</label>
                    <input type="text" name="codigo" class="form-control" placeholder="escriba el nombre" required="">
                  </div>
                  <div class="col-sm-6">
                    <label>NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" placeholder="escriba el apellido" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>DESCRIPCION</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="escriba el correo electronico" required="">
                  </div>
                  <div>
                  <label>ACTIVO</label>
                    <input type="radio" name="activo" value="1" class="form-control" placeholder="escriba la direccion" required="">activo
                    <input type="radio" name="activo" value="0" class="form-control" placeholder="escriba la direccion" required="">inactivo
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection