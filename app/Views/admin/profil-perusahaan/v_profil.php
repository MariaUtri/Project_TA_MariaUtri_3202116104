<!-- Main row -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center py-3">
                    <!-- Btn edit -->
                    <?php if (!empty($profil_perusahaan)): ?>
                        <a href="<?= base_url('admin/profil-perusahaan/edit'); ?>" type="button"
                            class="btn btn-warning px-4 ms-2 text-white">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    <?php endif; ?>
                    <?php if (empty($profil_perusahaan)): ?>
                        <a href="<?= base_url('admin/profil-perusahaan/tambah'); ?>" type="button"
                            class="btn btn-primary px-3 ms-2 text-white">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    <?php endif; ?>
                    <div class="flash-data" data-flashdata="<?= session('message'); ?>"></div>
                </div>
                <?php if (!empty($profil_perusahaan)): ?>
                    <div class="col-md-6 text-end  d-flex justify-content-end align-items-center py-3">
                        <i class="fas fa-user-pen me-2"></i>
                        <span class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                            style="display:inline-block; width:200px;">
                            <?= $profil_perusahaan[0]->username; ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="fw-bold">Sejarah Perusahaan</h5>
                </div>
                <div class="card-body" style="white-space: pre-line; margin-top:-50px">
                    <p>
                        <?= isset($profil_perusahaan[0]->sejarah) && !empty($profil_perusahaan[0]->sejarah) ? htmlspecialchars($profil_perusahaan[0]->sejarah) : 'Belum ada data'; ?>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="fw-bold">Visi</h5>
                </div>
                <div class="card-body">
                    <p>
                        <?= isset($profil_perusahaan[0]->visi) && !empty($profil_perusahaan[0]->visi) ? htmlspecialchars($profil_perusahaan[0]->visi) : 'Belum ada data'; ?>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="fw-bold">Misi</h5>
                </div>
                <div class="card-body " style="white-space: pre-line; margin-top:-50px">
                    <p>
                        <?= isset($profil_perusahaan[0]->misi) && !empty($profil_perusahaan[0]->misi) ? htmlspecialchars($profil_perusahaan[0]->misi) : 'Belum ada data'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>