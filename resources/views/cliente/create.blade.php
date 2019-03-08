@extends ('layouts.admin')
@section ('contenido')
    <!-- Input addon -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Nuevo Artículo</h3>
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
            <form role="form" method="POST" action="{{ url('/cliente') }}" id="form-post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Usuario</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('username') ? old('username'):@$cliente->username }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Razón Social</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Mail</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Teléfono</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Rol</label><em>*</em>
                            <select class="form-control">
                                @foreach($roles as $rol)
                                    <option>{{$rol->name}}</option>
                                @endforeach
                            </select>
                            {{--<input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">--}}
                            {{--@foreach ($roles as $role)--}}
                            {{--{{ Form::checkbox('roles[]',  $role->id ) }}--}}
                            {{--{{ Form::label($role->name, ucfirst($role->name)) }}<br>--}}

                            {{--@endforeach--}}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Password</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9">
                            <label>Confirmar Password</label><em>*</em>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ? old('title'):@$post->title }}">
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </div>
@endsection

@push ('scripts')

@endpush