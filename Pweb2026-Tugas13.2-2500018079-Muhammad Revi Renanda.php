<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Pengolahan Nilai Mahasiswa</title>
</head>
<body>

<h2>Aplikasi Pengolahan Nilai Mahasiswa</h2>

<form method="post">
    Jumlah Mahasiswa :
    <input type="number" name="jumlah" min="1" required>
    <input type="submit" name="buat" value="Buat Form">
</form>

<hr>

<?php
function grade($nilai){
    if($nilai >= 85){
        return "A";
    }elseif($nilai >= 70){
        return "B";
    }elseif($nilai >= 60){
        return "C";
    }elseif($nilai >= 50){
        return "D";
    }else{
        return "E";
    }
}

function status($nilai){
    if($nilai >= 60){
        return "Lulus";
    }else{
        return "Tidak Lulus";
    }
}

function rataRata($array){
    return array_sum($array) / count($array);
}

if(isset($_POST['buat'])){
    $jumlah = $_POST['jumlah'];

    echo "<form method='post'>";

    echo "<input type='hidden' name='jumlah' value='$jumlah'>";

    for($i=0; $i<$jumlah; $i++){
        echo "<h4>Mahasiswa ".($i+1)."</h4>";

        echo "Nama :
        <input type='text' name='nama[]' required><br><br>";

        echo "Nilai :
        <input type='number' name='nilai[]' min='0' max='100' required><br><br>";
    }

    echo "<input type='submit' name='proses' value='Proses Data'>";
    echo "</form>";
}

if(isset($_POST['proses'])){

    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];

    echo "<h3>Hasil Pengolahan Nilai</h3>";

    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Grade</th>
            <th>Status</th>
          </tr>";

    for($i=0; $i<count($nama); $i++){

        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>".$nama[$i]."</td>";
        echo "<td>".$nilai[$i]."</td>";
        echo "<td>".grade($nilai[$i])."</td>";
        echo "<td>".status($nilai[$i])."</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";

    echo "<b>Rata-rata Nilai : ".number_format(rataRata($nilai),2)."</b>";
}
?>

</body>
</html>