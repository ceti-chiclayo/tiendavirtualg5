<table id="tabla-compras" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Fecha de registro</th>
        <th>Proveedor</th>
        <th>Sucursal</th>
        <th>Total</th>
        <th style="width: 200px;">Operaciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($compras as $compra) : ?>
        <tr>
            <td><?= $compra->fecha ?></td>
            <td><?= $compra->created_at ?></td>
            <td><?= $compra->proveedor->razon_social ?></td>
            <td><?= $compra->sucursal->nombre ?></td>
            <td class="text-right">S/ <?= number_format($compra->total, 2, '.', '') ?></td>
            <td class="text-center">
                <button onclick="ver(<?= $compra->id ?>, this)" class="btn btn-warning">Ver</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Fecha</th>
        <th>Fecha de registro</th>
        <th>Proveedor</th>
        <th>Sucursal</th>
        <th>Total</th>
        <th>Operaciones</th>
    </tr>
    </tfoot>
</table>
<script>
    $('#tabla-compras').DataTable();
</script>