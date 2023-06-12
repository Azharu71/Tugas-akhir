<h1 class="container-md text-center bg-info ">Histori Pembayaran</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>NO</th>
        <th>NISN</th>
        <th>NAMA</th>
        <th>TANGGAL DIBAYAR</th>
        <th>SPP</th>
        <th>JUMLAH BAYAR</th>>
        <th>PETUGAS</th>
    </tr>
    <?php $no = 1;
    $query = $db->query("SELECT * FROM pembayaran,siswa,spp WHERE pembayaran.nisn = siswa.nisn AND siswa.id_spp = spp.id_spp AND pembayaran.nisn = '$_SESSION[lognisn]'");
    if (mysqli_num_rows($query) < 1) :
    ?>
        <td colspan="8">
            <p>Belum ada histori pembayaran</p>
        </td>

        <?php else :
        foreach ($query as $data) :
            $petugas = $db->query("SELECT nama_petugas FROM petugas WHERE id_petugas = '$data[id_petugas]'")->fetch_assoc();
            // var_dump($data);
            // var_dump($kurang);
            // var_dump($petugas)

        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nisn']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['tgl_bayar']; ?></td>
                <td><?= $data['nominal']; ?></td>
                <td><?= $data['jumlah_bayar']; ?></td>

                <td><?= $petugas['nama_petugas']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<a href="siswa.php" class="btn btn-secondary">Kembali</a>