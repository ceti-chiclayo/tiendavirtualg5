<table id="tabla-clientes" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Correo electrónico</th>
        <th>Celular</th>
        <th style="width: 200px;">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($clientes as $cliente) : ?>
        <tr>
            <td><?= $cliente->nombre_completo ?></td>
            <td><?= $cliente->email ?></td>
            <td><?= $cliente->celular ?></td>
            <td class="text-center">
                <button title="Editar cliente" onclick="modalEditar(<?= $cliente->id ?>, this)" class="btn btn-warning">
                    Editar
                </button>
                <button title="Eliminar cliente" onclick="confirmarEliminar(<?= $cliente->id ?>, this)"
                        class="btn btn-danger">Eliminar
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Correo electrónico</th>
        <th>Celular</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-clientes').DataTable();
</script>