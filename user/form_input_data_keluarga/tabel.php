<?php
    //Koneksi database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbkeluarga";

    $koneksi= mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
    

    //Jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {
        //Pengujian apakah data akan diubah atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan diubah
             $edit = mysqli_query($koneksi, " UPDATE tkeluarga set
                                                nik = '$_POST[tnik]',
                                                nama = '$_POST[tnama]',
                                                tempat = '$_POST[ttempat]',
                                                tanggal = '$_POST[ttanggal]',
                                                alamat = '$_POST[talamat]',
                                                rtrw = '$_POST[trtrw]',
                                                jenis_kelamin = '$_POST[tjenis_kelamin]',
                                                agama = '$_POST[tagama]',
                                                statuss = '$_POST[tstatuss]'
                                             WHERE id_keluarga = '$_GET[id]'
                                            ");
            if($edit) //Jika ubah sukses
            {
                echo"<script>
                    alert('Ubah data sukses!');
                    document.location='index.php';
                </script>";
                }
                else
                {
                echo"<script>
                    alert('Ubah data gagal!');
                    document.location='index.php';
                </script>";
            }
        }
        else
        {
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tkeluarga (nik, nama, tempat, tanggal, alamat, rtrw, jenis_kelamin, agama, statuss)
                                          VALUES ('$_POST[tnik]', 
                                                 '$_POST[tnama]', 
                                                 '$_POST[ttempat]', 
                                                 '$_POST[ttanggal]', 
                                                 '$_POST[talamat]', 
                                                 '$_POST[trtrw]', 
                                                 '$_POST[tjenis_kelamin]', 
                                                 '$_POST[tagama]', 
                                                 '$_POST[tstatuss]')
                                         ");
            if($simpan) //Jika simpan sukses
            {
                echo"<script>
                        alert('Simpan data sukses!');
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo"<script>
                        alert('Simpan data gagal!');
                        document.location='index.php';
                    </script>";
            }
        }


        
    }


    //Pengujian jika tombol Ubah atau Hapus diklik
    if(isset($_GET['hal']))
    {
        //Pengujian jika Ubah data
        if($_GET['hal'] == "edit")
        {
            //Tampilkan data yang akan diubah
            $tampil = mysqli_query($koneksi, "SELECT * FROM tkeluarga WHERE id_keluarga = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //Jika data ditemukan, maka data ditampung dulu ke dalam variable
                $vnik = $data['nik'];
                $vnama = $data['nama'];
                $vtempat = $data['tempat'];
                $vtanggal = $data['tanggal'];
                $valamat = $data['alamat'];
                $vrtrw = $data['rtrw'];
                $vjenis_kelamin = $data['jenis_kelamin'];
                $vagama = $data['agama'];
                $vstatuss = $data['statuss'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //Persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tkeluarga WHERE id_keluarga = '$_GET[id]' ");
            if($hapus){
                echo"<script>
                        alert('Hapus data sukses!');
                        document.location='index.php';
                    </script>";
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <!-- Awal Card Tabel -->
    <div class="card mt-3">
    <div class="card-header bg-success text-white">
        Daftar Nama Keluarga
    </div>
        <div class="card-body">
        
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from tkeluarga order by id_keluarga desc");
                    while($data = mysqli_fetch_array($tampil)) :

                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$data['nik']?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['tempat']?>, <?=$data['tanggal']?></td>
                    <td><?=$data['alamat']?></td>
                    <td><?=$data['rtrw']?></td>
                    <td><?=$data['jenis_kelamin']?></td>
                    <td><?=$data['agama']?></td>
                    <td><?=$data['statuss']?></td>
                    <td>
                        <a href="index.php?hal=edit&id=<?=$data['id_keluarga']?>" class="btn btn-warning"> Ubah </a>
                        <a href="index.php?hal=hapus&id=<?=$data['id_keluarga']?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
                <?php endwhile; //penutup perulangan while?>
            </table>

        </div>
    </div>

    <!-- Akhir Card Tabel -->


</div>
</body>
</html>