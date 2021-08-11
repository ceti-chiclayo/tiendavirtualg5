<?php

/** @var array $listado */ ?>
<div class="card-header">
    <h3 class="card-title">
        Detalle de compra
    </h3>
    <div class="card-tools">
        <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <button class="btn btn-dark" href="#revenue-chart" data-toggle="tab" onclick="modalCrearItem()">
                    <i class="fas fa-plus-square"></i> Agregar
                </button>
            </li>
        </ul>
    </div>
</div>
<div class="card-body">
    <table class="table table-bordered" id="tabla-detalle">
        <thead>
        <tr>
            <th>Presentacion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th style="width:200px">Operaciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($detalle as $posicion => $item) : ?>
            <tr>
                <td><?php echo $item['presentacion']->titulo_listado ?></td>
                <td class="text-right"><?php echo $item['cantidad'] ?></td>
                <td class="text-right">S/ <?php echo number_format($item['precio_unitario'], 2, '.', '') ?></td>
                <td class="text-center">
                    <button onclick="editarItem(<?php echo $posicion ?>)" class="btn btn-warning">Editar
                    </button>
                    <button onclick="quitarItem(<?php echo $posicion ?>)" class="btn btn-danger">Eliminar
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $('#tabla-detalle').DataTable();
</script>