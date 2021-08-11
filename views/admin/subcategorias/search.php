<table id="tabla-subcategorias" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Nombre</th>
            <th>Slug</th>
            <th style="width: 200px;">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subcategorias as $subcategoria) : ?>
            <tr>
                <td><?= $subcategoria->categoriaPadre->nombre ?></td>
                <td><?= $subcategoria->nombre ?></td>
                <td><?= $subcategoria->slug ?></td>
                <td class="text-center">
                    <button onclick="modalEditar(<?= $subcategoria->id ?>, this)" class="btn btn-warning">Editar</button>
                    <button onclick="confirmarEliminar(<?= $subcategoria->id ?>, this)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Categoría</th>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Operaciones</th>
        </tr>
    </tfoot>
</table>
<script>
    $('#tabla-subcategorias').DataTable({
        ordering: true,
        columnDefs: [{
            targets: [3],
            orderable: false
        }]
    });
</script>