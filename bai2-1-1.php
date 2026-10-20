
<?php
$x = "5";
$y = 5;

echo "<h2>2.1 BIẾN VÀ KIỂU DỮ LIỆU TRONG PHP</h2>";

echo "<p>Gia tri cua x: ";
var_dump($x);
echo "</p>";

echo "<p>Gia tri cua y: ";
var_dump($y);
echo "</p>";

echo "<p>Kieu du lieu cua x: " . gettype($x) . "</p>";
echo "<p>Kieu du lieu cua y: " . gettype($y) . "</p>";

$tong = $x + $y;

echo "<p>Ket qua x + y = " . $tong . "</p>";
echo "<p>Kieu du lieu cua tong: " . gettype($tong) . "</p>";

// Vi du ve cac kieu du lieu PHP
$ten = "Nguyen Van A";
$tuoi = 20;
$diem = 8.5;
$dat = true;
$danhSach = ["PHP", "HTML", "CSS"];
$rong = null;

echo "<hr>";
echo "<h3>Cac kieu du lieu pho bien</h3>";

echo "String: ";
var_dump($ten);

echo "Integer: ";
var_dump($tuoi);

echo "Float: ";
var_dump($diem);

echo "Boolean: ";
var_dump($dat);

echo "Array: ";
var_dump($danhSach);

echo "NULL: ";
var_dump($rong);
?>
