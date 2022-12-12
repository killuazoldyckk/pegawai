<h2 class="judul">Data Pegawai</h2>
<a href="?hal=pegawai_tambah" class="tombol">Tambah</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal lahir</th>
            <th>Jabatan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($con, "SELECT * FROM pekerja LEFT JOIN jabatan ON pekerja.id_jabatan=jabatan.id_jabatan ORDER BY pekerja.id_pekerja DESC");
        $no = 0;
        while($data = mysqli_fetch_array($query)){
            $no++;
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><img src="images/<?php echo $data['foto'];?>" width="100"></td>
            <td><?php echo $data['nama_pegawai'];?></td>
            <td><?php echo $data['jenis_kelamin'];?></td>
            <td><?php echo $data['tgl_lahir'];?></td>
            <td><?php echo $data['nama_jabatan'];?></td>
            <td><?php echo $data['keterangan'];?></td>
            <td>
                <a href="?hal=pegawai_edit&id=<?php echo $data['id_pegawai'];?>" class="tombol_edit"> Edit</a>
                <a href="?hal=pegawai_hapus&id=<?php echo $data['id_pegawai'];?>" class="tombol_hapus"> Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>