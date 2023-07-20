<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-3">
    <div class="row">
        <div class="col">
            <div class="col-md-6">
                <h2>Form Registrasi Pasien</h2>
                <b>==============================================</b>
                <br>
                <br>
                <form name="createForm" id="createForm" method="post">
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control <?php echo (isset($validation) && $validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nama_pasien') ?>" placeholder="Nama Pasien">
                            <?= csrf_field(); ?>

                            <?php
                            if (isset($validation) && $validation->hasError('nama_pasien')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('nama_pasien') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jenkel" id="jenkel" class="form-control <?php echo (isset($validation) && $validation->hasError('jenkel')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('jenkel') ?>" placeholder="Jenis Kelamin">
                            <?php
                            if (isset($validation) && $validation->hasError('jenkel')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('jenkel') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Nomor Kartu Identitas</label>
                            <input type="number" name="no_identitas" id="no_identitas" class="form-control <?php echo (isset($validation) && $validation->hasError('no_identitas')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('no_identitas') ?>" placeholder="Nomor Kartu Identitas">
                            <?php
                            if (isset($validation) && $validation->hasError('no_identitas')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('no_identitas') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?php echo (isset($validation) && $validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('tgl_lahir') ?>" placeholder="Tangal Lahir">
                            <?php
                            if (isset($validation) && $validation->hasError('tgl_lahir')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('tgl_lahir') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="text" name="umur" id="umur" class="form-control <?php echo (isset($validation) && $validation->hasError('umur')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('umur') ?>" placeholder="Umur">
                            <?php
                            if (isset($validation) && $validation->hasError('umur')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('umur') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea type="text" name="alamat" id="alamat" class="form-control <?php echo (isset($validation) && $validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('alamat') ?>" placeholder="Alamat"></textarea>
                            <?php
                            if (isset($validation) && $validation->hasError('alamat')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('alamat') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input type="number" name="telpon" id="telpon" class="form-control <?php echo (isset($validation) && $validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('telpon') ?>" placeholder="Nomor Telpon">
                            <?php
                            if (isset($validation) && $validation->hasError(' Nomor Telpon')) {
                                echo '<p class="invalid-feedback">' . $validation->getError('telpon') . '</p>';
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