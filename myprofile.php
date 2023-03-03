<?php
echo "<h1>Biodata Diri</h1>"
?>

<?php
$nama ="Ajeng Listya Devani";
$nama1 ="Ajeng";
$alamat="Jl. Pacar Keling 1 no 123";
$tgl="02-05-2003";
$telp="081234500863";
$email="21081010220@student.upnjatim.ac.id";

$umur = date_diff(date_create($tgl), date_create('today'))->y;

echo "<table>
    <tr>
        <th>Nama Lengkap</th>
        <th>:</th>
        <td>$nama</td>
        <td rowspan=14><img src=profile.jpeg widt='200px' height='200px'></td>
    </tr>

    <tr>
        <th>Alamat</th>
        <th>:</th>
        <td>$alamat</td>
    </tr>

    <tr>
        <th>TTL </th>
        <th>:</th>
        <td>$umur</td>
    </tr>

    <tr>
        <th>Phone</th>
        <th>:</th>
        <td>$telp</td>
    </tr>

    <tr>
        <th>E-mail</th>
        <th>:</th>
        <td>$email</td>
    </tr>
</table>"
?>

