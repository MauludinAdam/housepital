<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">

        <marquee>
            <h1 class="berjalan">Silahkan Isi Data Dokter pada Form dibawah ini</h1>
        </marquee>
        <div class="col-md-6">

            <form name="createForm" id="createForm" method="post">
                <div class="mb-3">
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" id="nama_dok" name="nama_dok" class="form-control <?php echo (isset($validation) && $validation->hasError('nama_dok')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nama_dok') ?>" placeholder="Nama Dokter">

                        <?php
                        if (isset($validation) && $validation->hasError('nama_dok')) {
                            echo '<p class="invalid-feedback">' . $validation->getError('nama_dok') . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Poli Klinik</label>
                        <input type="text" name="pilpol" id="pilpol" class="form-control <?php echo (isset($validation) && $validation->hasError('pilpol')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('pilpol') ?>" placeholder="Poli Klinik">
                        <?php
                        if (isset($validation) && $validation->hasError('pilpol')) {
                            echo '<p class="invalid-feedback">' . $validation->getError('pilpol') . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="number" name="telpon_dok" id="telpon_dok" class="form-control <?php echo (isset($validation) && $validation->hasError('telpon_dok')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('telpon_dok') ?>" placeholder="Nomor Telpon">
                        <?php
                        if (isset($validation) && $validation->hasError('telpon_dok')) {
                            echo '<p class="invalid-feedback">' . $validation->getError('telpon_dok') . '</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Jadwal</label>
                        <input type="text" name="jadwal" id="jadwal" class="form-control <?php echo (isset($validation) && $validation->hasError('jadwal')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('jadwal') ?>" placeholder="Jadwal Dokter">
                        <?php
                        if (isset($validation) && $validation->hasError('jadwal')) {
                            echo '<p class="invalid-feedback">' . $validation->getError('jadwal') . '</p>';
                        }
                        ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>