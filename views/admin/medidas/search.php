<table id="tabla-medidas" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medidas as $medida) : ?>
            <tr>
                <td><?= $medida->nombre ?></td>
                <td>
                    <button onclick="modalEditar(<?= $medida->id ?>, this)" class="btn btn-warning">Editar</button>
                    <button onclick="confirmarEliminar(<?= $medida->id ?>, this)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Operaciones</th>
        </tr>
    </tfoot>
</table>
<script>
    $('#tabla-medidas').DataTable();
</script>