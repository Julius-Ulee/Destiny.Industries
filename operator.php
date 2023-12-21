<?php
// aritmatika
$angka1 = 5;
$angka2 = 5;

$hasilplus = $angka1 + $angka2;
$hasilkureng = $angka1 - $angka2;
$hasilkali = $angka1 * $angka2;
$hasilbagi = $angka1 / $angka2;

echo "penjumlahan: $hasilplus<br>"
echo "Pengurangan: $hasilkureng<br>"
echo "Perkalian: $hasilkali<br>"
echo "Pembagian: $hasilbaig<br>"

?>

<?php
//penugasan
$n = 4;

$n += 4;
$n -= 4;
$n *= 4;
$n /= 4;

echo "Nilai penugasan: $n";
?>

<?=
// perbandingan

$angka1 = 10;
$angka2 = 2;

if ($angka1 > $angka2) {
    echo "$angka1 lebih besar dari $angka2";
} elseif ($angka1 == $angka2) {
    echo "$angka1 sama dengan $angka2";
} else {
    echo "$angka1 lebih kecil dari $angka2"
}
?>

<?=
//string

$nama = "Ulee";
$namatengah = "ganteng";

$fullname = $nama . " " . $namatengah;
echo "nama lengkap saya: $fullname";
?>

<?=
// array
$barang = array('handpon', 'laptop', 'mouse', '192'); 
$barang[] = 'bantal';
echo "barang-barang: " . implode(",", $barang);
?>

<?=
// logika
$nilai1 = true;
$nilai2 = false;

$hasilAND = $nilai1 && $nilai2;
$hasilOR = $nilai1 || $nilai2;
$hasilNOT = !$nilai1;

echo "hasil AND: " . ($hasilAND ? 'true' : 'false') . "<br>";
echo "hasil OR: " . ($hasilOR ? 'true' : 'false') . "<br>";
echo "hasil NOT: " . ($hasilNOT ? 'true' : 'false') . "<br>";
?>

<?=
// increment & decrement
$c = 2

$c++;
$c--;

echo "Nilai c setelah increment dan decrement: $c";
?>

<?= 
// ternary
$umur = 20;

$stat = ($umur >= 20) ? "dewasa" : "anak";

echo "Umur beliau adalah: $stat";
?>