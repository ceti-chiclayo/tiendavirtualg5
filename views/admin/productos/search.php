<table id="tabla-productos" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Sub categoria</th>
            <th>Marca</th>
            <th>Título</th>
            <th style="width:80px">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td><?=$producto->categoria->categoriaPadre->nombre?></td>
                <td><?=$producto->categoria->nombre?></td>
                <td><?=$producto->marca->nombre?></td>
                <td><?=$producto->titulo?></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Categoría</th>
            <th>Sub categoria</th>
            <th>Marca</th>
            <th>Título</th>
            <th style="width:80px">Operaciones</th>
        </tr>
    </tfoot>
</table>
<script>
    $('#tabla-productos').DataTable({
        ordering: true,
        columnDefs: [{
            targets: [4],
            orderable: false
        }]
    });
</script>