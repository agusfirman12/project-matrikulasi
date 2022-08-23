<div class="main-content">
    <div class="box-nilai">
        <div class="judul">
            <div class="info">
                <h3>Unggah Nilai Mahasiswa</h3>
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
            <div class="navigasi">
                <a href="<?= BASEURL ?>uploadnilai/nilai/<?= $mhs['anggota_kelompok_id']; ?>" class="btn btn-sm btn-warning text-white">Lihat Nilai</a>
                <button type="button" class="btn btn-sm ml-3 text-white" style="background-color: #2980b9;" data-toggle="modal" data-target="#formModal">Upload Nilai</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Unggah Nilai Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>UploadNilai/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['mhs']['anggota_kelompok_id'] ?>">
                    <div class="form-group">
                        <label for="pembimbing_lapangan">Pembimbing Lapangan</label>
                        <input type="text" class="form-control" id="pembimbing_lapangan" name="pembimbing_lapangan">
                    </div>
                    <div class="form-group">
                        <label for="pembimbing_KP">pembimbing_KP</label>
                        <input type="number" class="form-control" id="pembimbing_KP" name="pembimbing_KP">
                    </div>
                    <div class="form-group">
                        <label for="penguji">penguji</label>
                        <input type="number" class="form-control" id="penguji" name="penguji">
                    </div>
                    <div class="form-group">
                        <label for="bukti_nilai">bukti nilai</label>
                        <input type="file" class="form-control-file" id="bukti_nilai" name="bukti_nilai">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Unggah Nilai</button>
            </div>
            </form>
        </div>
    </div>
</div>