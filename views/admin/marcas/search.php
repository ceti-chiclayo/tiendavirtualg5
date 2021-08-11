<table id="tabla-marcas" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($marcas as $marca) : ?>
            <tr>
                <td><?= $marca->nombre ?></td>
                <td><?= $marca->slug ?></td>
                <td>
                    <button onclick="modalEditar(<?= $marca->id ?>, this)" class="btn btn-warning">Editar</button>
                    <button onclick="confirmarEliminar(<?= $marca->id ?>, this)" class="btn btn-danger">Eliminar</button>
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
    $('#tabla-marcas').DataTable();
</script>