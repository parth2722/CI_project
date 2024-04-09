<?= $this->extend('menus') ?>

<?= $this->section('content') ?>



<body>
    <div class="container mt-5">
        <div class="card-header">

            <div class="col">Create Data</div>
            <div class="col text-right">
                <a href="<?php echo base_url("/crud/add") ?>" class="btn btn-success btn-sm">Create</a>
                <!-- <br>
                        <br>
                        <a href="/crud/add" class="btn btn-success btn-sm">Create2</a> -->
                <a href="<?php echo base_url("/stripe") ?>" class="btn btn-success btn-sm">Checkout</a>
            </div>

        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($user_data) : ?>
                        <?php foreach ($user_data as $user) : ?>

                            <td>
                                <?php echo $user['id']; ?>
                            </td>
                            <td>
                                <?php echo $user['name']; ?>
                            </td>
                            <td>
                                <?php echo $user['email']; ?>
                            </td>
                            <td>
                                <?php echo $user['gender']; ?>
                            </td>

                            <td><a href="<?= base_url('/crud/fetch_single_data/') . $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" onclick="delete_data(<?= $user['id'] ?>)" class="btn btn-danger btn-sm">Delete</button>
                            </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(' #users-list').DataTable();
        });

        function delete_data(id) {
            if (confirm("Are you sure you want to remove it?")) {
                window.location.href = "<?php echo base_url(); ?>/crud/delete/" + id;
            }
            return false;
        }
    </script>
</body>

<?= $this->endSection() ?>