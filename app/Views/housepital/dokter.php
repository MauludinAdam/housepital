<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-1">
    <div class="row">
        <div class="col">
            <h1 class="mt-3">Data Dokter </h1>
            <a href="<?php echo base_url('housepital/create_dokter'); ?>" class="btn btn-primary">Tambah Data Dokter</a>
            <div class="col-md-12 mb-1 mt-2">
                <?php if (session()->getFlashdata('sukses')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('sukses'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <table id="datatablesSimple" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Poli Klinik</th>
                        <th>Telpon</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach ($dokter as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_dok']; ?></td>
                            <td><?= $value['pilpol']; ?></td>
                            <td><?= $value['telpon_dok']; ?></td>
                            <td><?= $value['jadwal']; ?></td>
                            <td>
                                <a href="/housepital/edit/ <?= $value['id_dok']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>

                                <a href="/housepital/deleteData/<?= $value['id_dok']; ?>" class="btn btn-danger" onclick="return confirm('Yakin, Data ini mau di hapus ??')"><i class="fas fa-trash "></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>