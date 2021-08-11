<table id="tabla-colores" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colores as $color) : ?>
            <tr>
                <td><?= $color->nombre ?></td>
                <td><?= $color->slug ?></td>
                <td>
                    <button onclick="modalEditar(<?= $color->id ?>, this)" class="btn btn-warning">Editar</button>
                    <button onclick="confirmarEliminar(<?= $color->id ?>, this)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Operaciones</th>
        </tr>
    </tfoot>
</table>
<script>
    $('#tabla-colores').DataTable();
</script>