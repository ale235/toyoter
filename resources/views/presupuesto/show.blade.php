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
                <td class="tg-wp8o" colspan="5"><img src="{{asset('/images/toyoterlogo.png')}}" width="20%"></td>
                {{--<td class="tg-73oq">Fecha de Hoy: </td>--}}
                {{--<td class="tg-73oq" colspan="2">01/02/2019</td>--}}
            </tr>
            <tr>
                <td class="tg-73oq">Razón social:</td>
                <td class="tg-73oq">Norberto Sodero</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq">CUIT:</td>
                <td class="tg-73oq" colspan="2">20-24876880-1</td>
            </tr>
            <tr>
                <td class="tg-73oq">Domicilio comercial:</td>
                <td class="tg-73oq">San Juan 2653 Sta Fe</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq">IIBB:</td>
                <td class="tg-73oq" colspan="2">921-3907013-0</td>
            </tr>
            <tr>
                <td class="tg-73oq">Cond IVA:</td>
                <td class="tg-73oq">Inscrito</td>
                {{--<td class="tg-73oq"></td>--}}
                <td class="tg-73oq">Fecha Inicio de Actividades:</td>
                <td class="tg-73oq" colspan="2">01/02/2007</td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="5"></td>
            </tr>
            <tr>
                <td class="tg-0lax">CUIT: {{$cliente->cuit}}</td>
                <td class="tg-0lax"></td>
                {{--<td class="tg-0lax"></td>--}}
                <td class="tg-0lax">Apellido y Nombre / Razón Social:</td>
                <td class="tg-0lax" colspan="2"></td>
            </tr>
            <tr>
                <td class="tg-0lax">Cond. IVA:</td>
                <td class="tg-0lax"></td>
                {{--<td class="tg-0lax"></td>--}}
                <td class="tg-0lax">Domicilio:</td>
                <td class="tg-0lax" colspan="2"></td>
            </tr>
            <tr>
                <td class="tg-0lax">Chasis:</td>
                <td class="tg-0lax"  colspan="4"></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="5"></td>
            </tr>
            <tr>
                <td class="tg-0lax">Código</td>
                <td class="tg-0lax">Producto</td>
                <td class="tg-0lax">Cantidad</td>
                <td class="tg-0lax">Precio Unitario</td>
                <td class="tg-0lax">Total</td>
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
                <td class="tg-0lax" colspan="2"></td>
                <td class="tg-0lax" colspan="2">Importe total c/ IVA: </td>
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