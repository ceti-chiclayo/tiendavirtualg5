<table id="tabla-categorias" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Imagen</th>
            <th style="width: 200px;">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $categoria) : ?>
            <tr>
                <td><?= $categoria->nombre ?></td>
                <td><?= $categoria->slug ?></td>
                <td class="text-center">
                    <img width="100px" src="<?= $categoria->imagen_url ?>" />
                </td>
                <td class="text-center">
                    <button onclick="modalEditar(<?= $categoria->id ?>, this)" class="btn btn-warning">Editar</button>
                    <button onclick="confirmarEliminar(<?= $categoria->id ?>, this)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Imagen</th>
            <th>Operaciones</th>
        </tr>
    </tfoot>
</table>
<script>
    $('#tabla-categorias').DataTable();
</script>