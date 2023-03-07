<?php
echo "<h1>Biodata Diri</h1>"
?>

<?php
$nama_first="Ajeng";
$nama_middle="Listya";
$nama_last="Devani";
$nama1="Ajeng";
$alamat="Jl. Pacar Keling 1 no 123";
$tgl="02-05-2003";
$telp="081234500863";
$email="21081010220@student.upnjatim.ac.id";
$sekolah_smpn="SMPN 29 Surabaya";
$jurusan_smpn="-";
$thn_masuk_smp="2015";
$thn_lulus_smp="2018";
$sekolah_sma="SMAN 14 Surabaya";
$jurusan_sma="MIPA";
$thn_masuk_sma="2018";
$thn_lulus_sma="2021";
$thn_sma="2018-2021";

$umur = date_diff(date_create($tgl), date_create('today'))->y;
?>

<link rel="stylesheet" type="text/css" href="profile.css">


<div class="box">
    <div class="container">
            <div class="row">
                <div class="col">
                    <img src="profile.jpeg" width="250px" height="300px">
                </div>
                <div class="col">
                    <table>

                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?php echo $nama_first.' '.$nama_middle.' '.$nama_last?></td>
                        </tr>

                        <tr>
                            <th>Nama Panggilan</th>
                            <td><?php echo $nama1 ?></td>
                        </tr>
            
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td><?php echo $umur?></td>
                        </tr>
    
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $alamat?></td>
                        </tr>
                    
                        <tr>
                            <th>Email</th>
                            <td><?php echo $email?></td>
                        </tr>
                    
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $telp?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <h2>Riwayat Pendidikan</h2>
            <table>
                <tr>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                </tr>
                <tr>
                    <td><?php echo $sekolah_smpn?></td>
                    <td><?php echo $jurusan_smpn?></td>
                    <td><?php echo $thn_masuk_smp?></td>
                    <td><?php echo $thn_lulus_smp?></td>
                </tr>
                
                <tr>
                    <td><?php echo $sekolah_sma?></td>
                    <td><?php echo $jurusan_sma?></td>
                    <td><?php echo $thn_masuk_sma?></td>
                    <td><?php echo $thn_lulus_sma?></td>
                </tr>
            </table>
