@extends('layouts.app')

@section('content')


<div >

<div class="panel-heading">
                    Productos
                    @can('productos.create')
                    <a href="{{ route('productos.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>
<table class="table  table-striped  table-hover" id="tabla">

    <thead>
        <tr>
            <th style="width:120px; background-color: #5DACCD; color:#fff">descripcion</th>
            <th style="width:180px; background-color: #5DACCD; color:#fff">precio_venta</th>
            <th style=" background-color: #5DACCD; color:#fff">precio_compra</th>
            <th style=" background-color: #5DACCD; color:#fff">unidad</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">marcas</th>            
            <th style="width:120px; background-color: #5DACCD; color:#fff">catgorias</th>            
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($productos as $r): ?>
        <tr>

            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->precio_venta; ?></td>
            <td><?php echo $r->precio_compra; ?></td>
            <td><?php echo $r->unidade->Nombre; ?></td>
            <td><?php echo $r->marca->Nombre; ?></td>
            <td><?php echo $r->categoria->Nombre; ?></td>
            
             @can('products.edit')
                <td width="10px">
                <a href="{{ route('productos.edit', $r->id) }}" 
                                    class="btn btn-sm btn-default">
                                        editar
                 </a>
                </td>
            @endcan
            @can('productos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['productos.destroy', $r->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
            @endcan
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</div>
@endsection
