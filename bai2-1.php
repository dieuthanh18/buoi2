
<?php
// Ham kiem tra diem hop le
function kiemTraDiem($diem) {
    return is_numeric($diem) && $diem >= 0 && $diem <= 10;
}

// Khoi tao du lieu
$diem = "";
$thongBao = "";
$hopLe = false;

// Doc du lieu tu form POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $diem = trim($_POST["diem"] ?? "");

    if ($diem === "") {
        $thongBao = "Vui long nhap diem.";
    } elseif (!is_numeric($diem)) {
        $thongBao = "Diem phai la mot so.";
    } elseif (!kiemTraDiem($diem)) {
        $thongBao = "Diem phai nam trong khoang tu 0 den 10.";
    } else {
        $hopLe = true;
        $thongBao = "Diem hop le!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiem tra diem PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            color: #16864b;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 5px;
        }

        button {
            width: 100%;
            padding: 11px;
            margin-top: 18px;
            color: white;
            background: #16864b;
            border: none;
            cursor: pointer;
        }

        .ketqua {
            margin-top: 18px;
            padding: 12px;
            background: #e8f5e9;
        }

        .loi {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>KIỂM TRA ĐIỂM</h2>

    <form method="POST">
        <label for="diem">Nhập điểm (0–10):</label>

        <input
            type="number"
            id="diem"
            name="diem"
            min="0"
            max="10"
            step="any"
            value="<?= htmlspecialchars($diem, ENT_QUOTES, 'UTF-8') ?>"
        >

        <button type="submit">Kiểm tra</button>
    </form>

    <?php if ($thongBao !== ""): ?>
        <div class="ketqua <?= $hopLe ? "" : "loi" ?>">
            <?= htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
