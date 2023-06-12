<h1 class="container-md text-center bg-info">Data Kelas</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Kompetensi keahlian</th>
    </tr>
    <?php $no = 1;
    $query = $db->query("SELECT * FROM kelas");
    foreach ($query as $data) :
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_kelas']; ?></td>
            <td><?= $data['kompetensi_keahlian']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>