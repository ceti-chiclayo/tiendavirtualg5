<table id="tabla-proveedores" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Razón social</th>
        <th>RUC</th>
        <th>Dirección</th>
        <th style="width: 200px">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($proveedores as $proveedor) : ?>
        <tr>
            <td><?= $proveedor->razon_social ?></td>
            <td class="text-center"><?= $proveedor->ruc ?></td>
            <td><?= $proveedor->direccion ?></td>
            <td class="text-center">
                <button onclick="modalEditar(<?= $proveedor->id ?>, this)" class="btn btn-warning">Editar</button>
                <button onclick="confirmarEliminar(<?= $proveedor->id ?>, this)" class="btn btn-danger">Eliminar
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Razón social</th>
        <th>RUC</th>
        <th>Dirección</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-proveedores').DataTable();
</script>