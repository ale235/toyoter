@extends('layouts.admin')

@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 id="stocknegativo"></h3>

                    <p>Clientes a Activar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        {{--<div class="col-lg-6 col-xs-12">--}}
            {{--<!-- small box -->--}}
            {{--<div class="small-box bg-green">--}}
                {{--<div class="inner">--}}
                    {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}

                    {{--<p>Bounce Rate</p>--}}
                {{--</div>--}}
                {{--<div class="icon">--}}
                    {{--<i class="ion ion-stats-bars"></i>--}}
                {{--</div>--}}
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- ./col -->

    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $.ajax({
            type: 'get',
            url: '{!!URL::to('clientesSinActivar')!!}',
            success: function (data) {
                //console.log('success');
                $("#stocknegativo").text(data);

            },
            error: function () {

            }
        });
    });

</script>
@endpush