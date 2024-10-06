<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-success">
                    Tambah Pengguna
                </div>
                <div class="card-body">
                    <form id="tambahproduk" action="<?= base_url('admin/kelola-pengguna/tambah'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="username" class="col col-form-label">Username</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                                    name="username" id="username" value="<?= old('username') ?>"
                                    oninput="updatePassword()">
                                <?php if (isset($errors['username'])): ?>
                                    <div class="invalid-feedback"><?= $errors['username']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="col col-form-label ">Email</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email"
                                    id="email">
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?= $errors['email']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-6">
                                <label for="password" class="col col-form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password"
                                    value="<?= old('username') ?>" readonly>
                                <small>Password awal sama dengan username</small>
                            </div>
                            <div class="col-sm-6">
                                <label for="role" class="col col-form-label"> Role</label>
                                <select name="role" id="role"
                                    class="custom-select <?= isset($errors['role']) ? 'is-invalid' : '' ?>">
                                    <option value="" hidden>Pilih Role</option>
                                    <option value="Admin" <?= old('role') == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="Operator" <?= old('role') == 'Operator' ? 'selected' : ''; ?>>Operator
                                    </option>
                                </select>
                                <?php if (isset($errors['role'])): ?>
                                    <div class="invalid-feedback"><?= $errors['role']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-6">
                                <label for="status" class="col col-form-label">Status</label>
                                <input type="text" class="form-control" name="status" id="status" value="Aktif"
                                    readonly>
                                <small>Status awal pengguna otomatis aktif</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>


            <div class="flash-data" data-flashdata="<?= session('message'); ?>"></div>
            <div class="error" data-flashdata="<?= session('error'); ?>">
            </div>
            <div class="card">
                <div class="card-header bg-info">
                    Daftar Pengguna
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($user as $data): ?>
                                <?php if ($data->id_pengguna !== $id_pengguna): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data->username; ?></td>
                                        <td><?= $data->email; ?></td>
                                        <td>
                                            <?php if ($data->status == '1') { ?>
                                                Aktif
                                            <?php } else { ?>
                                                Non-Aktif
                                            <?php } ?>
                                        </td>
                                        <td><?= $data->role; ?></td>
                                        <td width="15%" class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm text-white mb-2"
                                                data-toggle="modal" data-target="#editModal<?= $data->id_pengguna; ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm text-white" data-toggle="modal"
                                                data-target="#hapusModal<?= $data->id_pengguna; ?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- edit modal -->
                <?php foreach ($user as $data): ?>
                    <div class="modal fade" id="editModal<?= $data->id_pengguna; ?>" data-backdrop="static"
                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Edit Pengguna
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/kelola-pengguna/ubah/' . $data->id_pengguna); ?>"
                                    method="post">
                                    <?= csrf_field(); ?>
                                    <?php $errors = session()->getFlashdata('errors'); ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="username" class="col col-form-label">Username</label>
                                                <input type="text"
                                                    class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                                                    name="username" id="username" value="<?= $data->username; ?>" readonly>
                                                <?php if (isset($errors['username'])): ?>
                                                    <div class="invalid-feedback"><?= $errors['username']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="email" class="col col-form-label ">Email</label>
                                                <input type="text"
                                                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                                    name="email" id="email" value="<?= $data->email; ?>" readonly>
                                                <?php if (isset($errors['email'])): ?>
                                                    <div class="invalid-feedback"><?= $errors['email']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <div class="col-sm-6">
                                                <label for="password" class="col col-form-label">Password</label>
                                                <input type="text" class="form-control" name="password" id="password"
                                                    value="<?= $data->password ?>" readonly>
                                                <small>Password hasil enskripsi</small>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="role" class="col col-form-label"> Role</label>
                                                <select name="role" id="role"
                                                    class="custom-select <?= isset($errors['role']) ? 'is-invalid' : '' ?>">
                                                    <option value="" hidden>Pilih Role</option>
                                                    <option value="Admin" <?= $data->role == 'Admin' ? 'selected' : ''; ?>>
                                                        Admin</option>
                                                    <option value="Operator" <?= $data->role == 'Operator' ? 'selected' : ''; ?>>Operator
                                                    </option>
                                                </select>
                                                <?php if (isset($errors['role'])): ?>
                                                    <div class="invalid-feedback"><?= $errors['role']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="status" class="col col-form-label">Status</label>
                                                <select name="status" id="status" class="custom-select">
                                                    <option value="" hidden>Pilih Role</option>
                                                    <option value="1" <?= $data->status == '1' ? 'selected' : ''; ?>>
                                                        Aktif
                                                    </option>
                                                    <option value="0" <?= $data->status == '0' ? 'selected' : ''; ?>>
                                                        Non-Aktif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- /.card-body -->
                <!-- hapus modal -->
                <?php foreach ($user as $data): ?>
                    <div class="modal fade" id="hapusModal<?= $data->id_pengguna; ?>" data-backdrop="static"
                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Edit Pengguna
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/kelola-pengguna/hapus/' . $data->id_pengguna); ?>"
                                    method="post">
                                    <?= csrf_field(); ?>
                                    <?php $errors = session()->getFlashdata('errors'); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        <p>Anda Yakin ingin menghapus pengguna dengan username : <?= $data->username; ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>