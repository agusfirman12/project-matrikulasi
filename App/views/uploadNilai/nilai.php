<div class="main-content">
    <div class="box-nilai">
        <div class="judul">
            <div class="info">
                <p>Nilai Mahasiswa Bimbingan</p>
                <div class="line"></div>
            </div>
        </div>
        <div class="main-info">
            <table border="1" cellpadding="20" cellspacing="0">
                <?php if (is_bool($data['nilai'])) : ?>
                    <p class="text-center">Nilai belum di upload</p>
                <?php else : ?>
                    <tr>
                        <th>Pembimbing Lapangan</th>
                        <th>Pembimbing KP</th>
                        <th>Penguji</th>
                    </tr>
                    <tr>
                        <td><?= $data['nilai']['nilai_pembimbing_lapangan']; ?></td>
                        <td><?= $data['nilai']['nilai_pembimbing_kp']; ?></td>
                        <td class="text-center"><?= $data['nilai']['nilai_penguji']; ?></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>