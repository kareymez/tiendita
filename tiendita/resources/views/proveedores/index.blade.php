<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiendita - Proveedores</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      <img src="{{ asset('img/logo.png')}}" width="30px">
        <a class="text-muted">Tiendita</a>
      </div>
      <div class="col-4 text-center"></div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted"></a>
      <a class="p-2 text-muted"></a>
      <a class="p-2 text-muted"></a>
      <a class="p-2 text-muted" href="{{  url('/')  }}"><i class="fas fa-box-open"></i> Articulos</a>
      <a class="p-2 text-muted" href="{{ url('/proveedores')}}"><i class="fas fa-people-carry"></i><u> Proveedores</u></a>
      <a class="p-2 text-muted" href="{{ url('/ventas')}}"><i class="fas fa-shopping-cart"></i> Ventas</a>
      <a class="p-2 text-muted"></a>
      <a class="p-2 text-muted"></a>
      <a class="p-2 text-muted"></a>
    </nav>
  </div>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">La Tiendita</h1>
      <p class="lead my-3">Un negocio exponencialmente inventado para un caso educativo.</p>
    </div>
  </div>

  @if ($message = Session::get('success'))
      <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ $message }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
    <button type="button" class="btn btn-primary float-right btn-sm" 
    data-toggle="modal" data-target="#addArticulo">
    <i class="fas fa-save"></i> Nuevo Proveedor</button>

<!--  Modal agregar articulo  -->
<div class="modal fade" id="addArticulo" tabindex="-1" aria-labelledby="addArticulo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- formulario  -->
      <form action="{{ route('proveedores.store') }}" enctype="multipart/form-data" method="POST">
      @csrf      
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>

        
        <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info"><i class="fas fa-save"></i> Guardar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!--  Modal agregar articulo  -->


    <h2 class="display-6 font-italic text-center">Proveedores</h2>
    
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($provedor as $key => $pro)    
                <tr>
                    <th scope="row"> {{$key+1}} </th>
                    <td>{{$pro->nombre}}</td>
                    <td>{{$pro->categoria}}</td>
                    <td>
                        <a class="btn-info btn-sm btn-default" href="#ShowProveedor-{{$pro->idProveedor}}" data-toggle="modal" title="Editar Negocio"><i class="fas fa-eye"></i></a>
                        <a class="btn-success btn-sm btn-default" href="#editArticulos-{{$pro->idProveedor}}" data-toggle="modal" title="Editar Negocio"><i class="fas fa-pen-alt"></i></a>
                        <a  href="/proveedores/destroy/{{$pro->idProveedor}}" id="idsele" class="btn-danger btn-sm btn-default" ><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Aún no se tienen datos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>        


<!-- funcionalidad para el modal -->
@foreach($provedor as $pro)
  <div class="modal fade bs-example-modal-lg" id="editArticulos-{{$pro->idProveedor}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{  route('proveedores.update',$pro->idProveedor) }}" method="POST" enctype="multipart/form-data" id="create">
      @method('PUT')
      @csrf 

          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="hidden" name="id" class="form-control validate" value="{{ $pro->idProveedor }}">
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" class="form-control validate" value="{{ $pro->nombre }}" required>
            </div>

            <div class="md-form mb-5">
              <label for="categoria">Categoria:</label>
              <input type="text" name="categoria" class="form-control validate" value="{{ $pro->categoria }}" required>
            </div>


            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-info"><i class="fas fa-save"></i> Actualizar</button>
            </div>
          </div>
          </form>

      </div>       
      
      </div>      
    </div>
  </div>
</div>
@endforeach
<!-- funcionalidad para el modal -->  


<!-- funcionalidad para el modal show -->
@foreach($provedor as $pro)
  <div class="modal fade bs-example-modal-lg" id="ShowProveedor-{{$pro->idProveedor}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ver detalles de artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{  route('articulos.update',$pro->idProveedor) }}" method="POST" enctype="multipart/form-data" id="create">
      @method('PUT')
      @csrf 

          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="hidden" name="id" class="form-control validate" value="{{ $pro->idProveedor }}">
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" class="form-control validate" value="{{ $pro->nombre }}" disabled>
            </div>

            <div class="md-form mb-5">
              <label for="categoria">Categoria:</label>
              <input type="text" name="categoria" class="form-control validate" value="{{ $pro->categoria }}" disabled>
            </div>
        
          </div>
            <div class="modal-footer d-flex justify-content-center">
            
              <button class="btn btn-dark" data-dismiss="modal"><i class="fas fa-save"></i> Cerrar</button>
            </div>
          </div>
          </form>

      </div>       
      
      </div>      
    </div>
  </div>
</div>
@endforeach
<!-- funcionalidad para el modal show -->  

  </div>
</body>
</html>