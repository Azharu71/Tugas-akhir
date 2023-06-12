<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #div1,
        #div1 * {
            visibility: visible;
        }

        #div1 {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<h1 class="container-md text-center bg-info ">Histori Pembayaran</h1>
<table class="table table-bordered table-striped" id="div1">
    <tr>
        <th>NO</th>
        <th>NISN</th>
        <th>NAMA</th>
        <th>TANGGAL DIBAYAR</th>
        <th>SPP</th>
        <th>STATUS BAYAR</th>
        <th>PETUGAS</th>
    </tr>
    <?php $no = 1;
    $query = $db->query("SELECT * FROM pembayaran,siswa,spp WHERE pembayaran.nisn = siswa.nisn AND siswa.id_spp = spp.id_spp");
    if (mysqli_num_rows($query) < 1) :
    ?>
        <td colspan="8">
            <p>Belum ada histori pembayaran</p>
        </td>

        <?php else :
        foreach ($query as $data) :
            $bayar = $db->query("SELECT SUM(jumlah_bayar) as jumlah FROM pembayaran WHERE nisn = '$data[nisn]'")->fetch_assoc();
            $kurang = $data['nominal'] - $bayar['jumlah'];
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
<a onclick="return window.print()" class="btn btn-secondary">Cetak</a>