<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- só o conteúdo do href já é suficiente -->
<a href="whatsapp://send?text=" class="botao-wpp">
    <!-- ícone -->
    <i class="fa fa-whatsapp"></i>
    Enviar
</a>
{{--<a href="{{url('/repuestos/$id')}}" class="botao-details">--}}
<a href="{{route('guest.show', $id)}}" class="botao-details">

    <!-- ícone -->
    <i class="fa fa-whatsapp"></i>
    Detalles
</a>
<style>
    .botao-wpp {
        text-decoration: none;
        color: #eee;
        display: inline-block;
        background-color: #25d366;
        font-weight: bold;
        padding: 1rem 2rem;
        border-radius: 3px;
    }
    .botao-details {
        text-decoration: none;
        color: #eee;
        display: inline-block;
        background-color: #1a2226;
        font-weight: bold;
        padding: 1rem 2rem;
        border-radius: 3px;
    }

    .botao-wpp:hover {
        background-color: darken(#25d366, 5%);
    }

    .botao-wpp:focus {
        background-color: darken(#25d366, 15%);
    }


</style>