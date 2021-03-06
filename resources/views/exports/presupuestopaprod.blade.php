<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-baqh{text-align:center;vertical-align:top}
    .tg .tg-wp8o{border-color:#000000;text-align:center;vertical-align:top}
    .tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    div.breakNow { page-break-inside:avoid; page-break-after:always; }
</style>
@if($role == "cliente_minorista")
    <table class="tg" align="center" width="100%" style="border:2px solid #000">
        <tr style="background-color: #9f191f;">
            <th class="tg-baqh" colspan="5">
                <div>
                    <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                    <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                </div>
            </th>
        </tr>

        <tr>
            <td class="tg-wp8o" colspan="5"><img src="{{url('/').$admin->logoempresa}}"></td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Razón social:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->razon_social}}</td>
            {{--<td class="tg-73oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CUIT:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->cuit}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Provincia:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->provincia}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>IIBB:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">921-3907013-0</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Cond IVA:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->iva}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Fecha Inicio de Actividades:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">01/02/2007</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Localidad:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->localidad}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Dirección:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->calleynumero}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CP:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="4">{{$admin->codigopostal}}</td>
            {{--<td class="tg-73oq"></td>--}}
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
                <td class="tg-0lax" style="font-size: 10px; white-space: nowrap;">{{\Illuminate\Support\Str::limit($repuesto->descripcion,40,'...')}}</td>
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
@endif

@if(($role == "cliente_mayorista"))
{{--<div class="breakNow"></div>--}}
<table class="tg" align="center" width="100%" style="border:2px solid #000">
    <tr style="background-color: #9f191f;">
        <th class="tg-baqh" colspan="5">
            <div>
                <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
            </div>
        </th>
    </tr>

    <tr>
        <td class="tg-wp8o" colspan="5"><img style="max-width:600px;" src="{{url('/').$cliente->logoempresa}}"></td>
    </tr>
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
        <td class="tg-0lax"><strong>Domicilio:</strong></td>
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
            <td class="tg-0lax" style="font-size: 10px; white-space: nowrap;">{{\Illuminate\Support\Str::limit($repuesto->descripcion,40,'...')}}</td>
            <td class="tg-0lax">{{$repuesto->cantidad}}</td>
            <td class="tg-0lax">{{$repuesto->precio * (1 + ($cliente->porcentaje/100))}}</td>
            <td class="tg-0lax">{{$repuesto->subtotal * (1 + ($cliente->porcentaje/100))}}</td>
        </tr>
    @endforeach
    <tr>
        <td class="tg-0lax" colspan="2"><small>Este presupuesto es válido por los siguientes 5 días después de su creación.</small> </td>
        <td class="tg-0lax" colspan="2"><strong>Importe total c/ IVA:</strong> </td>
        <td class="tg-0lax">$ {{$presupuesto->montototal * (1 + ($cliente->porcentaje/100))}}</td>
    </tr>
</table>

@if((is_null($cliente->verdatostoyoter) || ($cliente->verdatostoyoter == 1)) && ($role == "cliente_mayorista"))
    <div class="breakNow"></div>
    <table class="tg" align="center" width="100%" style="border:2px solid #000">
        <tr style="background-color: #9f191f;">
            <th class="tg-baqh" colspan="5">
                <div>
                    <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                    <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                </div>
            </th>
        </tr>

        <tr>
            <td class="tg-wp8o" colspan="5"><img src="{{url('/').$admin->logoempresa}}"></td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Razón social:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->razon_social}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CUIT:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->cuit}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Provincia:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->provincia}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>IIBB:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">921-3907013-0</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Cond IVA:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->iva}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Fecha Inicio de Actividades:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">01/02/2007</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Localidad:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->localidad}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Dirección:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->calleynumero}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CP:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="4">{{$admin->codigopostal}}</td>
            {{--<td class="tg-73oq"></td>--}}
        </tr>
        <tr>
            <td class="tg-0lax" colspan="5"></td>
        </tr>
    </table>
@endif

@if((($cliente->vercosto == 1) || is_null($cliente->vercosto)) && ($role == "cliente_mayorista"))
    <div class="breakNow"></div>
    <table class="tg" align="center" width="100%" style="border:2px solid #000">
        <tr style="background-color: #9f191f;">
            <th class="tg-baqh" colspan="5">
                <div>
                    <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                    <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                </div>
            </th>
        </tr>

        <tr>
            <td class="tg-wp8o" colspan="5"><img style="max-width:600px;" src="{{url('/').$cliente->logoempresa}}"></td>
        </tr>
        <tr>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>CUIT: </strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;">{{$cliente->cuit}}</td>
            {{--<td class="tg-0style="font-size: 10px; white-space: nowrap;"lax"></td>--}}
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Apellido y Nombre / Razón Social:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$cliente->razon_social}}</td>
        </tr>
        <tr>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Cond. IVA:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;">{{$cliente->iva}}</td>
            {{--<td class="tg-0style="font-size: 10px; white-space: nowrap;"lax"></td>--}}
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Domicilio:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$cliente->provincia}}</td>
        </tr>
        <tr>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Localidad:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;">{{$cliente->localidad}}</td>
            {{--<td class="tg-0style="font-size: 10px; white-space: nowrap;"lax"></td>--}}
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Dirección:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$cliente->calleynumero}}</td>
        </tr>
        <tr>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>CP:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;">{{$cliente->codigopostal}}</td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"><strong>Chasis:</strong></td>
            <td class="tg-0lax"style="font-size: 10px; white-space: nowrap;"  colspan="2">{{$cliente->chasis}}</td>
        </tr>
        <tr>
            <td class="tg-0lax" colspan="5"></td>
        </tr>
        <tr>
            <td class="tg-0lax"><strong>Código</strong></td>
            <td class="tg-0lax" colspan="2"><strong>Productooo</strong></td>
            <td class="tg-0lax"><strong>Cantidad</strong></td>
            <td class="tg-0lax"><strong>Precio Unitario</strong></td>
            <td class="tg-0lax"><strong>Total</strong></td>
        </tr>
        @foreach($repuestos as $repuesto)
            <tr>
                <td class="tg-0lax">{{$repuesto->codigo}}</td>
                <td class="tg-0lax" style="font-size: 10px; white-space: nowrap;">{{\Illuminate\Support\Str::limit($repuesto->descripcion,40,'...')}}</td>
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
@endif
@endif

@if(($role == "admin"))
    <table class="tg" align="center" width="100%" style="border:2px solid #000">
        <tr style="background-color: #9f191f;">
            <th class="tg-baqh" colspan="5">
                <div>
                    <span><strong style="color: white">PRESUPESTO - N°: {{$presupuesto->id}}</strong></span>
                    <span style="color: white; float: right">Fecha: {{now()->format('d/m/y')}}</span>
                </div>
            </th>
        </tr>

        <tr>
            <td class="tg-wp8o" colspan="5"><img src="{{url('/').$admin->logoempresa}}"></td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Razón social:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->razon_social}}</td>
            {{--<td class="tg-73oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CUIT:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->cuit}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Provincia:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->provincia}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>IIBB:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">921-3907013-0</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Cond IVA:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->iva}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Fecha Inicio de Actividades:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">01/02/2007</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Localidad:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;">{{$admin->localidad}}</td>
            {{--<td class="tg-7style="font-size: 10px; white-space: nowrap;"3oq"></td>--}}
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>Dirección:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="2">{{$admin->calleynumero}}</td>
        </tr>
        <tr>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;"><strong>CP:</strong></td>
            <td class="tg-73oq"style="font-size: 10px; white-space: nowrap;" colspan="4">{{$admin->codigopostal}}</td>
            {{--<td class="tg-73oq"></td>--}}
        </tr>
        <tr>
            <td class="tg-0lax" colspan="5"></td>
        </tr>
        <tr>
            <td class="tg-0lax"><strong>Código</strong></td>
            <td class="tg-0lax"><strong>Producto</strong></td>
            <td class="tg-0lax" style="white-space: nowrap;"><strong>Cantidad</strong></td>
            <td class="tg-0lax"><strong>Precio Unitario</strong></td>
            <td class="tg-0lax"><strong>Total</strong></td>
        </tr>
        @foreach($repuestos as $repuesto)
            <tr>
                <td class="tg-0lax">{{$repuesto->codigo}}</td>
                <td class="tg-0lax"  style="font-size: 10px; white-space: nowrap;">{{\Illuminate\Support\Str::limit($repuesto->descripcion,40,'...')}}</td>
                <td class="tg-0lax" style="white-space: normal;">{{$repuesto->cantidad}}</td>
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
@endif