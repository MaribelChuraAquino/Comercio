@extends('layouts.layout2')

@section('contenido')
<div class="content-wrapper">
    <div class="container">
        <p class="login-box-msg">Registrar a un nuevo usuario</p>

        <form action="{{ route('registrar.nuevo') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="input-group mb-3">
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="input-group mb-3">
                        <input name="nro_documento" type="number" class="form-control" placeholder="C.I.">
                    </div>
                    <div class="input-group mb-3">
                        <input name="direccion" type="text" class="form-control" placeholder="Direccion">
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input name="telefono" type="number" class="form-control" placeholder="Celular">
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Correo Electronico">
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password">
                    </div>
                </div>  
                <div class="col" align="right">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        Acepto los <a href="#">terminos</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <!-- /.col -->
                </div>  
            </div>    
        
        </form>
  </div>
</div>

@endsection