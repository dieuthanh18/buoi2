
<?php
$hoten = "";
$cc = "";
$gk = "";
$ck = "";
$diemTong = null;
$xeploai = "";
$loi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = trim($_POST["hoten"] ?? "");
    $cc = $_POST["cc"] ?? "";
    $gk = $_POST["gk"] ?? "";
    $ck = $_POST["ck"] ?? "";

    if ($hoten == "") {
        $loi = "Vui lòng nhập họ tên!";
    } elseif (
        $cc === "" || $gk === "" || $ck === "" ||
        !is_numeric($cc) || !is_numeric($gk) ||
        !is_numeric($ck)
    ) {
        $loi = "Vui lòng nhập đầy đủ điểm!";
    } elseif (
        $cc < 0 || $cc > 10 ||
        $gk < 0 || $gk > 10 ||
        $ck < 0 || $ck > 10
    ) {
        $loi = "Điểm phải nằm trong khoảng 0 đến 10!";
    } else {
        $diemTong = round($cc * 0.1 + $gk * 0.3 + $ck * 0.6, 2);

        if ($diemTong >= 8) {
            $xeploai = "Giỏi";
        } elseif ($diemTong >= 6.5) {
            $xeploai = "Khá";
        } elseif ($diemTong >= 5) {
            $xeploai = "Trung bình";
        } else {
            $xeploai = "Chưa đạt";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính điểm sinh viên</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f2f5;
            padding: 30px;
        }
        .container {
            max-width: 420px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #1769aa;
        }
        label {
            display: block;
            margin-top: 12px;
        }
        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #1769aa;
            color: white;
            border: none;
            cursor: pointer;
        }
        .ketqua {
            background: #e5f6e8;
            padding: 12px;
            margin-top: 20px;
        }
        .loi {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>TÍNH ĐIỂM SINH VIÊN</h2>

    <form method="POST">
        <label>Họ và tên:</label>
        <input type="text" name="hoten"
               value="<?= htmlspecialchars($hoten) ?>">

        <label>Điểm chuyên cần:</label>
        <input type="number" name="cc" min="0" max="10"
               step="any" value="<?= htmlspecialchars($cc) ?>">

        <label>Điểm giữa kỳ:</label>
        <input type="number" name="gk" min="0" max="10"
               step="any" value="<?= htmlspecialchars($gk) ?>">

        <label>Điểm cuối kỳ:</label>
        <input type="number" name="ck" min="0" max="10"
               step="any" value="<?= htmlspecialchars($ck) ?>">

        <button type="submit">Tính điểm</button>
    </form>

    <?php if ($loi != ""): ?>
        <p class="loi"><?= htmlspecialchars($loi) ?></p>
    <?php endif; ?>

    <?php if ($diemTong !== null): ?>
        <div class="ketqua">
            <h3>KẾT QUẢ</h3>
            <p>Họ tên: <?= htmlspecialchars($hoten) ?></p>
            <p>Điểm tổng kết: <strong><?= $diemTong ?></strong></p>
            <p>Xếp loại: <strong><?= $xeploai ?></strong></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
