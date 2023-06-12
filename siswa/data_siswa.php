<h1 class="container-md text-center bg-info ">Data siswa</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>NISN</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>KELAS</th>
        <th>ALAMAT</th>
        <th>TELP</th>
        <th>SPP</th>
        <th>STATUS PEMBAYARAN</th>
    </tr>
    <?php
    $query = $db->query("SELECT * FROM siswa,kelas,spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp AND siswa.nisn = '$_SESSION[lognisn]' ORDER by nama DESC");
    $pembayaran = $db->query("SELECT SUM(jumlah_bayar) as jumlah FROM pembayaran WHERE nisn =  '$_SESSION[lognisn]'")->fetch_assoc();
    foreach ($query as $data) :
        $kurang = $data['nominal'] - $pembayaran['jumlah'];
    ?>
        <tr>
            <td><?= $data['nisn']; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['nama_kelas'], ' ', $data['kompetensi_keahlian']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['no_telp']; ?></td>
            <td>Rp. <?= number_format($data['nominal'], 2, '.', '.'); ?></td>
            <td>
                <?php if ($kurang > 0) : ?>
                    <p><?= 'Kurang ' . 'Rp. ' . number_format($kurang, 2, '.', '.'); ?></p>
                <?php else : ?>
                    <p class="btn btn-success">Lunas</p>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>