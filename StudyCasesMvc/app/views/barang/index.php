<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
        <a href="<?= BASE_URL; ?>/barang/tambah" class="btn btn-primary">Tambah Peminjaman</a>
    <br>
    <form action="<?= BASE_URL;?>/barang/cari" method="post" style="text-align: right; margin-top: -2em;">
      <input type="text" name="cari" style="border-radius: 5px;
                                              width: 15em;
                                              height: 2em;">
      <button type="submit" style="border-radius: 5px;
                                   height: 2em;
                                   border: grey;
                                   width: 3em;">Cari</button>
      <button type="submit" action="<?= BASE_URL;?>/barang/index" style="color: red; border: red;
                                   border-radius: 5px;
                                   border: red;
                                   height: 2em;
                                   width: 3em;">Reset</button>
</form>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['barang'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td>
                <?php
                $tgl_kembali = strtotime($row["tgl_kembali"]);
                $tgl_pinjam = strtotime($row["tgl_pinjam"]);

                $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                if ($selisih_hari == 0 || $selisih_hari == 1 || $selisih_hari > 2) {
                    echo '<div style="background-color: #3EC70B; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;"
                    >Sudah Kembali</div>';
                } else{
                    echo '<div style="background-color: red; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;"
                    >Belum Kembali</div>';
                }
                ?>
                </td>
                <td>
                    <?php
                    $tgl_kembali = strtotime($row["tgl_kembali"]);
                    $tgl_pinjam = strtotime($row["tgl_pinjam"]);

                    $selisih_hari = floor(($tgl_kembali - $tgl_pinjam)/ (60 * 60 * 24));

                    if ($selisih_hari == 0 || $selisih_hari == 1 || $selisih_hari > 2) {
                        echo '';
                    } else {
                        echo '<a href="' . BASE_URL . '/barang/edit/' . $row['id'] . '" class="btn btn-primary">Edit</a>';
                    }
                    echo '<a href="' . BASE_URL . '/barang/hapus/' . $row['id'] . '" class="btn btn-primary" style="background-color: red; border: red; margin-left: 2px;">Hapus</a>';
                    ?>
                </td>
            </tr>

            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>