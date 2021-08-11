<table id="tabla-sucursales" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th style="width: 200px">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sucursales as $sucursal) : ?>
        <tr>
            <td><?= $sucursal->nombre ?></td>
            <td><?= $sucursal->direccion ?></td>
            <td class="text-center">
                <button onclick="modalEditar(<?= $sucursal->id ?>, this)" class="btn btn-warning">Editar</button>
                <button onclick="confirmarEliminar(<?= $sucursal->id ?>, this)" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-sucursales').DataTable();
</script>