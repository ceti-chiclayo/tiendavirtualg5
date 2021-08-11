<table id="tabla-usuarios" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nombre completo</th>
        <th>Correo electrónico</th>
        <th>¿Es cliente?</th>
        <th style="width: 200px">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?= $usuario->nombre_completo ?></td>
            <td><?= $usuario->email ?></td>
            <td><?= isset($usuario->cliente_id) ? 'SI' : 'NO' ?></td>
            <td class="text-center">
                <button onclick="modalEditar(<?= $usuario->id ?>, this)" class="btn btn-warning">Editar</button>
                <button onclick="confirmarEliminar(<?= $usuario->id ?>, this)" class="btn btn-danger">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Nombre completo</th>
        <th>Correo electrónico</th>
        <th>¿Es cliente?</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-usuarios').DataTable({
        ordering: true,
        columnDefs: [
            {targets: [3], orderable: false}
        ]
    });
</script>