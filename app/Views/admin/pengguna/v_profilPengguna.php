<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-info">
            Profil Pengguna
            <div class="flash-data" data-flashdata="<?= session('message'); ?>">
            </div>
        </div>

        <div class="card-body">
            <form id="" action="<?= base_url('admin/profil-pengguna/ubah/' . $id_pengguna); ?>" method="post">
                <?= csrf_field(); ?>
                <?php $errors = session()->getFlashdata('errors'); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="username" class="col col-form-label">Username</label>
                        <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                            name="username" id="username"
                            value="<?= (isset($errors['username'])) ? old('username') : $user->username ?>">
                        <?php if (isset($errors['username'])): ?>
                            <div class="invalid-feedback"><?= $errors['username']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="email" class="col col-form-label">Email</label>
                        <input type="text" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                            name="email" id="email"
                            value="<?= (isset($errors['email'])) ? old('email') : $user->email ?>">
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?= $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="password" class="col col-form-label">Password</label>
                        <input type="text" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                            name="password" id="password"
                            value="<?= (isset($errors['password'])) ? old('password') : $user->password ?>">
                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback"><?= $errors['password']; ?></div>
                        <?php endif; ?>
                        <small>password yang ditampilkan adalah hasil enskripsi</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="role" class="col col-form-label">Role</label>
                        <input type="text" class="form-control" name="role" id="role" value="<?= $user->role ?>"
                            readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning btn-sm text-white">Edit
                    Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card-header -->