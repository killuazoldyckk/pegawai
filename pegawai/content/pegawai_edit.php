<?php
if(!defined('INDEX')) die ("");
$query  = mysqli_query($con, "SELECT * FROM pekerja WHERE id_pegawai='$$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<h2 class="judul">Tambah Pegawai</h2>
<form action="?hal=pegawai_update" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id_pegawai'];?>">
    <div class="form-group">
        <label for="foto">foto</label>
        <input type="file" name="foto" id="foto">
        <img src="images/<?php echo $data['foto'];?>" width="150">
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <div class="input"><input type="text" name="nama" id="nama" value="<?php echo $data['nama_pegawai'];?>"></div>
    </div>

    <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <?php
        if($data['jenis_kelamin'] == "L"){
            $l = " checked";
            $p = "";
        }else {
            $l = "";
            $p = " checked";
        }
        ?>
        <input type="radio" id="jk" name="jk" value="L" <?php echo $l;?>>Laki-laki
        <input type="radio" id="jk" name="jk" value="P" <?php echo $p;?>>Perempuan
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <div class="input"><input type="date" name="tanggal" id="tanggal" value="<?php echo $data['tgl_lahir'];?>"></div>
    </div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <div class="input"></div>
        <select name="jabatan" id="jabatan">
            <option>--Pilih jabatan</option>
            <?php
            $queryjabatan = mysqli_query($con, "SELECT * FROM jabatan");
            while($j=mysqli_fetch_array($queryjabatan)) {
                echo "<option value='$j[id_jabatan]' ";
                if ($j['id_jabatan'] == $data['id_jabatan'])
                    echo " selected";
                echo ">$j[nama_jabatan]</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <div class="input">
            <textarea name="keterangan" id="keterangan" rows="5" style="width: 100%;"><?php echo $data['keterangan'];?></textarea>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol_simpan">
        <input type="reset" value="Batal" class="tombol_reset">
    </div>
</form>