@extends ('layouts.admin')
@section ('contenido')
    <div class="col-lg-12">
        <table class="tg table " align="center" width="100%" style="border:2px solid #000; border-radius: 10px;">
            <tr style="background-color: #9f191f;">
                <th class="tg-baqh" colspan="5">
                    <div style=" display: block">
                        <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                        <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                    </div>
                </th>
            </tr>

            <tr>
                <td class="tg-wp8o" colspan="5"><img src="{{asset($admin->logoempresa)}}" width="20%"></td>
                {{--<td class="tg-73oq">Fecha de Hoy: </td>--}}
                {{--<td class="tg-73oq" colspan="2">01/02/2019</td>--}}
            </tr>
            <tr>
                <td class="tg-73oq"><strong>Razón social:</strong></td>
                <td class="tg-73oq">{{$admin->razon_social}}</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq"><strong>CUIT:</strong></td>
                <td class="tg-73oq" colspan="2">{{$admin->cuit}}</td>
            </tr>
            <tr>
                <td class="tg-73oq"><strong>Provincia:</strong></td>
                <td class="tg-73oq">{{$admin->provincia}}</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq"><strong>Localidad::</strong></td>
                <td class="tg-73oq" colspan="2">{{$admin->localidad}}</td>
            </tr>

            <tr>
                <td class="tg-73oq"><strong>Dirección: </strong></td>
                <td class="tg-73oq">{{$admin->calleynumero}}</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq"><strong>CP:</strong></td>
                <td class="tg-73oq" colspan="2">{{$admin->codigopostal}}</td>
            </tr>
            <tr>
                <td class="tg-73oq"><strong>Cond IVA:</strong></td>
                <td class="tg-73oq">{{$admin->iva}}</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq"><strong>Fecha Inicio de Actividades:</strong></td>
                <td class="tg-73oq" colspan="2">01/02/2007</td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="5"></td>
            </tr>
            <tr style="background-color: #9f191f;">
                <th class="tg-baqh" colspan="5">
                    <div style=" display: block">
                        <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                        <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                    </div>
                </th>
            </tr>
            @if($cliente->logoempresa != "")
            <tr>
                <td class="tg-wp8o" colspan="5"><img src="{{asset($cliente->logoempresa)}}" width="20%"></td>
                {{--<td class="tg-73oq">Fecha de Hoy: </td>--}}
                {{--<td class="tg-73oq" colspan="2">01/02/2019</td>--}}
            </tr>
            @endif
            <tr>
                <td class="tg-0lax"><strong>CUIT: </strong></td>
                <td class="tg-0lax">{{$cliente->cuit}}</td>
                {{--<td class="tg-0lax"></td>--}}
                <td class="tg-0lax"><strong>Apellido y Nombre / Razón Social:</strong></td>
                <td class="tg-0lax" colspan="2">{{$cliente->razon_social}}</td>
            </tr>
            <tr>
                <td class="tg-0lax"><strong>Cond. IVA:</strong></td>
                <td class="tg-0lax">{{$cliente->iva}}</td>
                {{--<td class="tg-0lax"></td>--}}
                <td class="tg-0lax"><strong>Provincia:</strong></td>
                <td class="tg-0lax" colspan="2">{{$cliente->provincia}}</td>
            </tr>
            <tr>
                <td class="tg-0lax"><strong>Localidad:</strong></td>
                <td class="tg-0lax">{{$cliente->localidad}}</td>
                {{--<td class="tg-0lax"></td>--}}
                <td class="tg-0lax"><strong>Dirección:</strong></td>
                <td class="tg-0lax" colspan="2">{{$cliente->calleynumero}}</td>
            </tr>
            <tr>
                <td class="tg-0lax"><strong>CP:</strong></td>
                <td class="tg-0lax">{{$cliente->codigopostal}}</td>
                <td class="tg-0lax"><strong>Chasis:</strong></td>
                <td class="tg-0lax"  colspan="2">{{$cliente->chasis}}</td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="5"></td>
            </tr>
            <tr>
                <td class="tg-0lax"><strong>Código</strong></td>
                <td class="tg-0lax"><strong>Producto</strong></td>
                <td class="tg-0lax"><strong>Cantidad</strong></td>
                <td class="tg-0lax"><strong>Precio Unitario</strong></td>
                <td class="tg-0lax"><strong>Total</strong></td>
            </tr>
            @foreach($repuestos as $repuesto)
                <tr>
                    <td class="tg-0lax">{{$repuesto->codigo}}</td>
                    <td class="tg-0lax">{{$repuesto->descripcion}}</td>
                    <td class="tg-0lax">{{$repuesto->cantidad}}</td>
                    <td class="tg-0lax">{{$repuesto->precio}}</td>
                    <td class="tg-0lax">{{$repuesto->subtotal}}</td>
                </tr>
            @endforeach
            <tr>
                <td class="tg-0lax" colspan="2"><small>Este presupuesto es válido por los siguientes 5 días después de su creación.</small> </td>
                <td class="tg-0lax" colspan="2"><strong>Importe total c/ IVA:</strong> </td>
                <td class="tg-0lax">$ {{$presupuesto->montototal}}</td>
            </tr>
        </table>
    </div>
    <br>
@endsection

@push ('scripts')
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-baqh{text-align:center;vertical-align:top}
    .tg .tg-wp8o{border-color:#000000;text-align:center;vertical-align:top}
    .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top}
</style>
@endpush