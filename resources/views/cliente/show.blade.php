@extends ('layouts.admin')
@section ('contenido')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Cliente</h3>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <u>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </u>
            </div>
        @endif
        <div class="box box-body">
            <form role="form" action="{{ url('cliente',$cliente->id) }}" method="POST" id="form-post" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Usuario</label><em>*</em>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):@$cliente->username }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Razón Social</label><em>*</em>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{ old('razon_social') ? old('razon_social'):@$cliente->razon_social }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Mail</label><em>*</em>
                            <input type="text" name="mail" id="mail" class="form-control" value="{{ old('mail') ? old('mail'):@$cliente->mail }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Teléfono</label><em>*</em>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') ? old('telefono'):@$cliente->telefono }}">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Rol</label><em>*</em>
                            <select name="role" class="form-control">
                                @foreach($roles as $rol)
                                    @if($rol->name == $role)
                                        <option selected>{{$rol->name}}</option>
                                    @else
                                    <option>{{$rol->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--<div class="row form-group">--}}
                        {{--<div class="col-md-9">--}}
                            {{--<label>Password</label><em>*</em>--}}
                            {{--<input type="text" name="password" id="password" class="form-control" value="{{ old('password') ? old('password'):@$cliente->password }}">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="row form-group">
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Primary</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection