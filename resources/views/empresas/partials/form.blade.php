@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Razon Social</label>
            <input type="text" class="form-control" name="razonSocial" value="{{(isset($empresa))?$empresa->razonSocial:old('razonSocial')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre Completo</label>
            <input type="text" class="form-control" name="nombreCompleto" value="{{(isset($empresa))?$empresa->nombreCompleto:old('nombreCompleto')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{(isset($empresa))?$empresa->direccion:old('direccion')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="{{(isset($empresa))?$empresa->telefono:old('telefono')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo" value="{{(isset($empresa))?$empresa->correo:old('correo')}}" required>
        </div>
    </div>
</div>