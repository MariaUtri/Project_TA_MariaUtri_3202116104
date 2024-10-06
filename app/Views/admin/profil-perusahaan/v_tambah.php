<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('profil-perusahaan'); ?>" type="button" class="btn">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/profil-perusahaan/tambah'); ?>" method="post">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="sejarah">Sejarah</label>
                    <textarea class="form-control auto-height <?= isset($errors['sejarah']) ? 'is-invalid' : '' ?>"
                        name="sejarah" id="sejarah"></textarea>
                    <?php if (isset($errors['sejarah'])): ?>
                        <div class="invalid-feedback"><?= $errors['sejarah']; ?></div>
                    <?php endif; ?>
                    <label for="visi" class="mt-3">Visi</label>
                    <textarea class="form-control auto-height  <?= isset($errors['visi']) ? 'is-invalid' : '' ?>"
                        name="visi" id="visi"></textarea>
                    <?php if (isset($errors['visi'])): ?>
                        <div class="invalid-feedback"><?= $errors['visi']; ?></div>
                    <?php endif; ?>
                    <label for="misi" class="mt-3">Misi</label>
                    <textarea class="form-control auto-height <?= isset($errors['misi']) ? 'is-invalid' : '' ?>"
                        name="misi" id="misi"></textarea>
                    <?php if (isset($errors['misi'])): ?>
                        <div class="invalid-feedback"><?= $errors['misi']; ?></div>
                    <?php endif; ?>
                </div>

                <a href="<?= base_url('profil-perusahaan'); ?>" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>