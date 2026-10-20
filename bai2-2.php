
<?php
echo "<h2>2.2 - SO SANH == VA === TRONG PHP</h2>";

// Bai tap trong slide
$a = 0;
$b = "0";

echo "<h3>1. So sanh 0 va \"0\"</h3>";

echo '0 == "0": ';
var_dump($a == $b);

echo '0 === "0": ';
var_dump($a === $b);

// Vi du thu hai
echo "<h3>2. So sanh false va 0</h3>";

$c = false;
$d = 0;

echo "false == 0: ";
var_dump($c == $d);

echo "false === 0: ";
var_dump($c === $d);

// Vi du thu ba
echo "<h3>3. So sanh chuoi \"0\" va so 0</h3>";

$e = "0";
$f = 0;

echo '"0" == 0: ';
var_dump($e == $f);

echo '"0" === 0: ';
var_dump($e === $f);

// Giai thich
echo "<hr>";
echo "<h3>Ket luan</h3>";
echo "<p>== so sanh gia tri, PHP co the chuyen doi kieu du lieu.</p>";
echo "<p>=== so sanh ca gia tri va kieu du lieu.</p>";
?>
