<table id="tabla-cupones" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Tipo</th>
        <th>Código</th>
        <th>Monto</th>
        <th style="width: 200px">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cupones as $cupon) : ?>
        <tr>
            <td><?= $cupon->tipo ?></td>
            <td><?= $cupon->codigo ?></td>
            <td><?= $cupon->monto ?></td>
            <td class="text-center">
                <button onclick="modalEditar(<?= $cupon->id ?>, this)" class="btn btn-warning">Editar</button>
                <button onclick="confirmarEliminar(<?= $cupon->id ?>, this)" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Tipo</th>
        <th>Código</th>
        <th>Monto</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-cupones').DataTable();
</script>