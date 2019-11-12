<html>
    <head><title>Data Barang</title></head>
    <?php
        $conn = mysqli_connect('localhost','root','','barang'); 
    ?>
    <body> 
        <center>
        <?php 
        error_reporting(E_ALL ^ E_NOTICE);
        $kode_buku = $_POST['kode_buku'];
        $kode_buku2 = $_POST['kode_buku2'];
        $nama_buku = $_POST['nama_buku'];
        $kode_jenis = $_POST['kode_jenis'];
        $submit = $_POST['submit'];
        $ubah = $_POST["ubah"];
        $input = "insert into buku values ('$kode_buku','$nama_buku','$kode_jenis')";
        if($submit) {
            mysqli_query($conn,$input);
            echo "</br> Data berhasil dimasukkan";
        } elseif ($ubah) {
                $update = "UPDATE buku 
                SET kode_buku='$kode_buku', nama_buku='$nama_buku', kode_jenis='$kode_jenis'
                WHERE kode_buku= '$kode_buku2'";
                mysqli_query($conn,$update);
                echo "<h3>UPDATED</h3>";
        }
        if($_GET["hps"]) {
            $kode_buku = $_GET["hps"];
            $delete = "DELETE FROM buku where kode_buku='$kode_buku'";
            mysqli_query($conn,$delete);
            echo "<h3>DELETED</h3>";
        } elseif($_GET["ubh"]) {
            $kode_buku= $_GET["ubh"];
            $cari = "SELECT * from buku where kode_buku='$kode_buku'";
            $hasil = mysqli_query($conn,$cari);
            $data = mysqli_fetch_row($hasil);
        }
    ?>
            <h3>Masukkan data barang</h3>
        
        <table border='0'>
            <form method='post' action='form2.php'>
                <tr>
                    <td width='25%'>kode buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='kode_buku' size='10' value="<?php echo $data[0] ?>">
                    <input type='hidden' name='kode_buku2' size='10' value="<?php echo $data[0] ?>">
                    </td>
                </tr>
                <tr>
                    <td width='25%'>name buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='nama_buku' size='30' value="<?php echo $data[1] ?>"></td>
                </tr>
                <tr>
                    <td width='25%'>kode jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <select name='kode_jenis'>
                        <?php 
                            $sql = "select * from jenis_buku";
                            $retval = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($retval)) {
                                echo "<option value='$row[kode_jenis]' > $row[nama_jenis] </option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
            </table>
            <?php 
                                if($data) {
                                    echo "<input type='submit' name='ubah' value='ubah'>";
                                } else {
                                    echo "<input type='submit' name='submit' value='submit'>";
                                }
                            ?>
        </form>
    

    <hr>
    <h3>Data Barang</h3>
    <table border='1' width='60%'>
        <tr>
            <td align='center' width='20%'><b>kode buku</b></td>
            <td align='center' width='30%'><b>nama buku</b></td>
            <td align='center' width='10%'><b>keterangan jenis</b></td>
            <td width='10%'> Aksi </td>
        </tr>
        <?php 
            $cari = "select * from buku,jenis_buku where buku.kode_jenis = jenis_buku.kode_jenis";
            $hasil = mysqli_query($conn, $cari);
            while($data = mysqli_fetch_row($hasil)) {
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td> 
                                <a href='form2.php?ubh=$data[0]'> ubah </a>
                                <a href='form2.php?hps=$data[0]'> hapus </a>
                            </td>
                </tr>
                ";
            }
        ?>
    </table>

    <br><br><br>
    <hr>

    <?php 
        error_reporting(E_ALL ^ E_NOTICE);
        $kode_jenis = $_POST['kode_jenis'];
        $kode_jenis2 = $_POST['kode_jenis2'];
        $nama_jenis = $_POST['nama_jenis'];
        $keterangan_jenis = $_POST['keterangan_jenis'];
        $submit2 = $_POST['submit2'];
        $ubah2 = $_POST["ubah2"];
        $input2 = "insert into jenis_buku values ('$kode_jenis','$nama_jenis','$keterangan_jenis')";
        if($submit2) {
            mysqli_query($conn,$input2);
            echo "</br> Data berhasil dimasukkan";
        } elseif ($ubah2) {
                $update2 = "UPDATE jenis_buku 
                SET kode_jenis='$kode_jenis', nama_jenis='$nama_jenis', keterangan_jenis='$keterangan_jenis'
                WHERE kode_jenis= '$kode_jenis2'";
                mysqli_query($conn,$update2);
                echo "<h3>UPDATED</h3>";
        }
        if($_GET["hps2"]) {
            $kode_jenis = $_GET["hps2"];
            $delete2 = "DELETE FROM jenis_buku where kode_jenis='$kode_jenis'";
            mysqli_query($conn,$delete2);
            echo "<h3>DELETED</h3>";
        } elseif($_GET["ubh2"]) {
            $kode_jenis= $_GET["ubh2"];
            $cari2 = "SELECT * from jenis_buku where kode_jenis='$kode_jenis'";
            $hasil2 = mysqli_query($conn,$cari2);
            $data2 = mysqli_fetch_row($hasil2);
        }
    ?>
            <h3>Masukkan jenis buku</h3>
        
        <table border='0'>
            <form method='post' action='form2.php'>
                <tr>
                    <td width='25%'>kode jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='kode_jenis' size='10' value="<?php echo $data2[0] ?>">
                    <input type='hidden' name='kode_jenis2' size='10' value="<?php echo $data2[0] ?>">
                    </td>
                </tr>
                <tr>
                    <td width='25%'>name jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='nama_jenis' size='30' value="<?php echo $data2[1] ?>"></td>
                </tr>
                <tr>
                    <td width='25%'>keterangan jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type='text' name='keterangan_jenis' size='30' value="<?php echo $data2[2] ?>"> </td>
                </tr>
            </table>
            <?php 
                                if($data2) {
                                    echo "<input type='submit' name='ubah2' value='ubah'>";
                                } else {
                                    echo "<input type='submit' name='submit2' value='submit'>";
                                }
                            ?>
        </form>
    

    <hr>
    <h3>Jenis Buku</h3>
    <table border='1' width='60%'>
        <tr>
            <td align='center' width='20%'><b>kode jenis</b></td>
            <td align='center' width='30%'><b>nama jenis</b></td>
            <td align='center' width='10%'><b>keterangan jenis</b></td>
            <td width='10%'> Aksi </td>
        </tr>
        <?php 
            $cari = "select * from jenis_buku";
            $hasil = mysqli_query($conn, $cari);
            while($data = mysqli_fetch_row($hasil)) {
                echo "
                <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[2]</td>
                    <td> 
                                <a href='form2.php?ubh2=$data[0]'> ubah </a>
                                <a href='form2.php?hps2=$data[0]'> hapus </a>
                            </td>
                </tr>
                ";
            }
        ?>
    </table>

    </center>
    </body>
</html>