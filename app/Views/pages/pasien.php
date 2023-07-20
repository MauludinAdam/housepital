<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-3">
    <div class="row">
        <div class="col">
            <h1>Data Pasien</h1>
            <a href="<?php echo base_url('housepital/create_pasien'); ?>" class="btn btn-success">Tambah Data Pasien</a>
            <div class="col-md-12 mb-1 mt-2">
                <?php if (session()->getFlashdata('sukses')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('sukses'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <table id="datatablesSimple" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Identitas</th>
                        <th>Tgl Lahir</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>No.Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pasien as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_pasien']; ?></td>
                            <td><?= $value['jenkel']; ?></td>
                            <td><?= $value['no_identitas']; ?></td>
                            <td><?= $value['tgl_lahir']; ?></td>
                            <td><?= $value['umur']; ?></td>
                            <td><?= $value['alamat']; ?></td>
                            <td><?= $value['telpon']; ?></td>
                            <td width=14%>
                                <a href="/Housepital/editPasien/ <?= $value['id_pasien']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>

                                <a href="Housepital/deletePasien/<?= $value['id_pasien']; ?>" class="btn btn-danger" onclick="return confirm('Yakin, Data ini mau Di hapus ??')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>