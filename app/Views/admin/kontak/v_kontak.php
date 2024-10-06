<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-info">
                    Kontak Utama
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center py-3">
                                    <?php if (empty($kontak)) { ?>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#tambahModal"><i class="fas fa-plus"></i> Tambah</button>
                                    <?php } else { ?>
                                        <button class="btn btn-warning btn-sm text-white px-3" data-toggle="modal"
                                            data-target="#editModal"><i class="fas fa-edit"></i> Edit
                                        </button>
                                    <?php } ?>
                                </div>
                                <?php if (!empty($kontak)): ?>
                                    <div class="col-md-6 text-end  d-flex justify-content-end align-items-center py-3">
                                        <i class="fas fa-user-pen me-2"></i>
                                        <span class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                                            style="display:inline-block; width:200px;">
                                            <?= $kontak[0]->username; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="card-body table-responsive">
                            <table class="table">
                                <tr>
                                    <td width="9%"><b>Alamat</b></td>
                                    <td class="text-center"> : </td>
                                    <td>
                                        <?php if (empty($kontak[0]->alamat)) { ?>
                                            <small class="ms-2"><i>Belum ada data</i></small>
                                        <?php } else { ?>
                                            <?= $kontak[0]->alamat; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%"><b>No. Telepon</b></td>
                                    <td width="3%" class="text-center"> : </td>
                                    <td>
                                        <?php if (empty($kontak[0]->no_telp)) { ?>
                                            <small class="ms-2"><i>Belum ada data</i></small>
                                        <?php } else { ?>
                                            <?= $kontak[0]->no_telp; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%"><b>Email</b></td>
                                    <td class="text-center"> : </td>
                                    <td>
                                        <?php if (empty($kontak[0]->email)) { ?>
                                            <small class="ms-2"><i>Belum ada data</i></small>
                                        <?php } else { ?>
                                            <?= $kontak[0]->email; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="5%"><b>Maps</b></td>
                                    <td class="text-center"> : </td>
                                    <td>
                                        <?php if (empty($kontak[0]->maps)): ?>
                                            <small class="ms-2"><i>Belum ada data</i></small>
                                        <?php else: ?>
                                            <p class="text-break">
                                                <?= ($kontak[0]->maps); ?>
                                            </p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?= session('message'); ?>">
                    </div>



                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info">
                    Sosial Media
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">

                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahSosmed">
                                <i class="fas fa-plus"></i> Tambah
                            </button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTables" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10px;" scope="col">No</th>
                                        <th>Sosial Media</th>
                                        <th>Link</th>
                                        <th>Aksi</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($sosmed as $data): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data->akun_sosmed; ?></td>
                                            <td><?= $data->link_sosmed; ?></td>
                                            <td width="35%" class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm text-white mb-2"
                                                    data-toggle="modal" data-target="#editSosmed<?= $data->id_sosmed ?>"><i
                                                        class=" fas fa-edit"></i>
                                                    Edit</button>

                                                <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal"
                                                    data-target="#hapusSosmed<?= $data->id_sosmed ?>"><i
                                                        class=" fas fa-trash-alt"></i>
                                                    Hapus</button>
                                            </td>
                                            <td width="25%">
                                                <i class="fas fa-user-pen me-2"></i>
                                                <span
                                                    class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                                                    style="display:inline-block; width:200px;">
                                                    <?= $data->username; ?>
                                                </span>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- Modal Tambah data Kontak -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kontak</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/kontak/tambah'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $id_pengguna; ?>">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control mb-3" rows="3" name="alamat" id="alamat"
                                    placeholder="Masukan..." required>
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" class="form-control mb-3" name="no_telp" id="no_telp"
                                    placeholder="Masukan..." required>
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="misi" placeholder="Masukan..."
                                    required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah data -->

        <!-- Modal Edit data Kontak -->
        <?php if (!empty($kontak)) { ?>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kontak</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/kontak/ubah'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <div class="mb-3">
                                    <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $id_pengguna; ?>">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control mb-3" name="alamat" id="alamat" rows="3"
                                        required><?= $kontak[0]->alamat; ?></textarea>

                                    <label for="no_telp">No. Telepon</label>
                                    <input type="text" class="form-control mb-3" name="no_telp" id="no_telp"
                                        value="<?= $kontak[0]->no_telp; ?>" required>
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="<?= $kontak[0]->email; ?>" required>
                                    <label for="maps">Maps</label>
                                    <textarea name="maps" id="maps" type="text"
                                        class="text-break form-control"> <?= ($kontak[0]->maps); ?></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Modal Edit data -->


        <!-- Modal Tambah data Sosmed -->
        <div class="modal fade" id="tambahSosmed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Sosial Media</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/kontak/sosmed/tambah'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $id_pengguna; ?>">
                                <label for="sosmed">Sosial Media</label>
                                <input type="text" class="form-control mb-3" name="sosmed" id="sosmed"
                                    placeholder="contoh: Facebook, Instagram" required>
                                <label for="link">Link</label>
                                <input type="text" class="form-control mb-3" name="link" id="link"
                                    placeholder="contoh: https:instagram.com" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah data -->

        <!-- Modal Edit data sosmed -->
        <?php foreach ($sosmed as $data): ?>
            <div class="modal fade" id="editSosmed<?= $data->id_sosmed; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kontak</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/kontak/sosmed/ubah/' . $data->id_sosmed); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <div class="mb-3">
                                    <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $id_pengguna; ?>">
                                    <label for="sosmed">Sosial Media</label>
                                    <input type="text" class="form-control mb-3" name="sosmed" id="sosmed"
                                        placeholder="contoh: Facebook, Instagram" value="<?= $data->akun_sosmed; ?>"
                                        required>
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control mb-3" name="link" id="link"
                                        placeholder="contoh: https:instagram.com" value="<?= $data->link_sosmed; ?>"
                                        required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Modal Edit data -->

        <!-- Modal hapus data sosmed -->
        <?php foreach ($sosmed as $data): ?>
            <div class="modal fade" id="hapusSosmed<?= $data->id_sosmed; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kontak</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/kontak/sosmed/hapus/' . $data->id_sosmed); ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="mb-3">
                                    <div><?= $data->akun_sosmed . ' : ' . $data->link_sosmed; ?></div>
                                    Yakin Hapus Data?
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Modal hapus data -->

        <!-- /.card-body -->
    </div>
</div>