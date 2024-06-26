<?= $this->extend('menus') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card rounded-0">
        <div class="card-header">
            <div class="d-flex w-100 justify-content-between">
                <div class="col-auto">
                    <div class="card-title h4 mb-0 fw-bolder">List of Products</div>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('/product_add') ?>" class="btn btn btn-primary bg-gradient rounded-0"><i class="fa fa-plus-square"></i> Add Product</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-stripped table-bordered">
                    <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="15%">
                        <col width="40%">
                        <col width="20%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <th class="p-1 text-center">#</th>
                        <th class="p-1 text-center">Code</th>
                        <th class="p-1 text-center">Product</th>
                        <th class="p-1 text-center">Description</th>
                        <th class="p-1 text-center">Price</th>
                        <th class="p-1 text-center">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $row) : ?>
                            <tr>
                                <th class="p-1 text-center align-middle"><?= $row['id'] ?></th>
                                <td class="px-2 py-1 align-middle"><?= $row['code'] ?></td>
                                <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                                <td class="px-2 py-1 align-middle"><?= $row['description'] ?></td>
                                <td class="px-2 py-1 align-middle text-end"><?= number_format($row['price'], 2) ?></td>
                                <td class="px-2 py-1 align-middle text-center">
                                    <a href="<?= base_url('/product_edit/' . $row['id']) ?>" class="mx-2 text-decoration-none text-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('/product_delete/' . $row['id']) ?>" class="mx-2 text-decoration-none text-danger" onclick="if(confirm('Are you sure to delete <?= $row['code'] ?> - <?= $row['name'] ?> from list?') !== true) event.preventDefault()"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (count($products) <= 0) : ?>
                            <tr>
                                <td class="p-1 text-center" colspan="6">No result found</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>