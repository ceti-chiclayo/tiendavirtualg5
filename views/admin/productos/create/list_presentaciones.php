<?php

/** @var array $listado */ ?>
<div class="card-header">
    <h3 class="card-title">
        Presentaciones
    </h3>
    <div class="card-tools">
        <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <button class="btn btn-dark" href="#revenue-chart" data-toggle="tab" onclick="modalCrearPresentacion()">
                    <i class="fas fa-plus-square"></i> Agregar
                </button>
            </li>
        </ul>
    </div>
</div>
<div class="card-body">
    <table class="table table-bordered" id="tabla-presentaciones">
        <thead>
            <tr>
                <th>Medida</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Precio oferta</th>
                <th>Precio compra</th>
                <th>Codigo</th>
                <th>Porcentaje descuento</th>
                <th style="width:80px">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($presentaciones as $posicion => $item) : ?>
                <tr>
                    <td><?php echo $item['medida_nombre'] ?></td>
                    <td><?php echo $item['color_nombre'] ?></td>
                    <td><?php echo $item['precio_venta'] ?></td>
                    <td><?php echo $item['precio_oferta'] ?></td>
                    <td><?php echo $item['precio_compra'] ?></td>
                    <td><?php echo $item['codigo'] ?></td>
                    <td><?php echo $item['porcentaje_descuento'] ?></td>
                    <td>
                        <button onclick="editarPresentacion(<?php echo $posicion?>)" class="btn btn-warning">Editar</button>
                        <button onclick="quitarPresentacion(<?php echo $posicion?>)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $('#tabla-presentaciones').DataTable();
    $('#html1').jstree();
</script>