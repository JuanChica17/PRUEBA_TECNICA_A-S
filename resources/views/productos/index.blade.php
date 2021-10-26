@extends('inicio.template')

@section('css')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
<script type="text/javascript">
    function ConfirmAdd(){
      var respuesta = confirm("¿Estas seguro que deseas registrar un cliente?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<script type="text/javascript">
    function ConfirmUpdate(){
      var respuesta = confirm("¿Estas seguro que deseas modificar este cliente?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
  <script type="text/javascript">
    function ConfirmDelete(){
      var respuesta = confirm("¿Estas seguro que deseas eliminar este cliente?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>
<div class="card shadow mb-4">
            <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">PRODUCTOS</h1>
              <a href="{{route('productos.create')}}" onclick="return ConfirmAdd()" class="btn btn-primary btn-circle">
                        <i class="fas fa-plus-square"></i>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered shadow-lg mt-4" id="productos" width="100%" cellspacing="0">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>CODIGO</th>
                      <th>NOMBRE</th>
                      <th>DESCRIPCION</th>
                      <th>MARCA</th>
                      <th>CATEGORIA</th>
                      <th>PRECIO</th>
                      <th>EDITAR</th>
                      <th>ELIMINAR</th>
                 </tr>
                  </thead>
                  <tbody>
                  @foreach($rows as $row)
                        <tr>
                        <td>{{$row->codigo}}</td>
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->descripcion}}</td>
                        <td>{{$row->marca}}</td>
                        <td>{{$row->nombreCategoria}}</td>
                        <td>{{$row->precio}}</td>
                        <td>
                        <a href="{{route('productos.edit', $row->id)}}" onclick="return ConfirmUpdate()" class="btn btn-success btn-circle">
                        <i class="fas fa-edit"></i>
                        </a>
                        </td>
                        <td>
                        <form action="{{route('productos.destroy', $row->id)}}" onclick="return ConfirmDelete()" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                        </button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#productos').DataTable({
      "lengthMenu": [[1,10, 50, -1], [1, 10, 50, "All"]]
    });
} );
</script>

@endsection
          
@endsection