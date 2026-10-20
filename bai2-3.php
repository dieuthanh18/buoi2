
<?php
// Ham xep loai diem
function xepLoai($diem) {
    if (!is_numeric($diem) || $diem < 0 || $diem > 10) {
        return "Diem khong hop le!";
    } elseif ($diem >= 8) {
        return "Gioi";
    } elseif ($diem >= 6.5) {
        return "Kha";
    } elseif ($diem >= 5) {
        return "Trung binh";
    } else {
        return "Chua dat";
    }
}

$diem = "";
$thongBao = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $diem = trim($_POST["diem"] ?? "");

    if ($diem === "") {
        $thongBao = "Vui long nhap diem!";
    } elseif (!is_numeric($diem) || $diem < 0 || $diem > 10) {
        $thongBao = "Diem phai la so tu 0 den 10!";
    } else {
        $thongBao = "Diem " . $diem . " - Xep loai: " . xepLoai($diem);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xep loai diem</title>
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
            text-align: center;
            color: #16864b;
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
            padding: 12px;
            margin-top: 18px;
            background: #16864b;
            color: white;
            border: none;
            cursor: pointer;
        }

        .ketqua {
            margin-top: 20px;
            padding: 12px;
            background: #e5f6e8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>XEP LOAI DIEM</h2>

    <form method="POST">
        <label for="diem">Nhap diem (0 - 10):</label>

        <input
            type="number"
            name="diem"
            id="diem"
            min="0"
            max="10"
            step="any"
            value="<?= htmlspecialchars($diem, ENT_QUOTES, 'UTF-8') ?>"
        >

        <button type="submit">Xep loai</button>
    </form>

    <?php if ($thongBao !== ""): ?>
        <div class="ketqua">
            <?= htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
