<div class="main-content">
    <div class="box-profile">
        <div class="hero-img">
            <img src="<?= BASEURL; ?>img/<?= $data['dosen']['gambar'] ?>" class="rounded-circle">
        </div>
        <div class="profile">
            <div class="dosbim">
                <p>Dosen Pembimbing</p>
            </div>
            <div class="name">
                <h5><?= $data['dosen']['nama_dosen'] ?></h5>
            </div>
            <div class="nik">
                <p><?= $data['dosen']['nik'] ?></p>
            </div>
            <div class="upload">
                <button type="button" class="btn btn-sm btn-upload" data-toggle="modal" data-target="#formModal">Ubah Foto</button>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="judul">
            <div class="info">
                <h3>Data Mahasiswa Bimbingan</h3>
            </div>
            <div class="line"></div>
        </div>
        <div class="main-info">
            <table border="1" cellpadding="20" cellspacing="0">
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $mhs['nim'] ?></td>
                        <td><?= $mhs['nama_mahasiswa'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Ubah Foto Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>DataMahasiswa/uploadFoto" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['dosen']['id'] ?>">
                    <img src="<?= BASEURL; ?>img/<?= $data['dosen']['gambar'] ?>" class="rounded-circle" width="100px">
                    <div class="form-group">
                        <label for="upload_foto">Foto Profile</label>
                        <p style="font-size: 12px; font-style: italic;">foto min 512 x 512 px</p>
                        <input type="file" class="form-control-file" id="upload_foto" name="upload_foto">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unggah Foto</button>
            </div>
            </form>
        </div>
    </div>
</div>