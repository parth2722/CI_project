<?= $this->extend('menus') ?>

<?= $this->section('content') ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <?php

        $validation = \Config\Services::validation();
        ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Edit Data</div>
                    <div class="col text-right">
                        <a href="/crud" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>">

                        <!-- Error -->
                        <?php
                        if ($validation->getError('name')) {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            " . $validation->getError('name') . "
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user_data['email']; ?>">

                        <?php
                        if ($validation->getError('email')) {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            " . $validation->getError('email') . "
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if ($user_data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($user_data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>

                        <?php
                        if ($validation->getError('gender')) {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            " . $validation->getError('gender') . "
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Current Image</label><br>
                        <?php
                        $imagePath = base_url('uploads/' . $user_data['type']);
                        echo '<img src="' . $imagePath . '" width="100" height="100" alt="Current Image">';
                        ?>
                    </div>

                    <div class="form-group">
                        <input type="file" name='type' class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user_data["id"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

<?= $this->endSection() ?>