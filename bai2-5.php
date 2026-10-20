
<?php
// Ham tinh diem tong ket
function finalScore(float $cc, float $mid, float $final): float {
    return $cc * 0.10 + $mid * 0.30 + $final * 0.60;
}

// Khoi tao du lieu
$cc = "";
$mid = "";
$final = "";
$diemTong = null;
$loi = "";

// Xu ly form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cc = trim($_POST["cc"] ?? "");
    $mid = trim($_POST["mid"] ?? "");
    $final = trim($_POST["final"] ?? "");

    if ($cc === "" || $mid === "" || $final === "") {
        $loi = "Vui long nhap day du ca 3 diem.";
    } elseif (
        !is_numeric($cc) ||
        !is_numeric($mid) ||
        !is_numeric($final)
    ) {
        $loi = "Diem phai la so.";
    } elseif (
        $cc < 0 || $cc > 10 ||
        $mid < 0 || $mid > 10 ||
        $final < 0 || $final > 10
    ) {
        $loi = "Moi diem phai nam trong khoang 0 den 10.";
    } else {
        $diemTong = round(
            finalScore((float)$cc, (float)$mid, (float)$final),
            2
        );
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ham tinh diem tong ket</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 450px;
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
            padding: 12px;
            margin-top: 20px;
            background: #16864b;
            color: white;
            border: none;
            cursor: pointer;
        }

        .ketqua {
            margin-top: 20px;
            padding: 15px;
            background: #e5f6e8;
        }

        .loi {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>TÍNH ĐIỂM TỔNG KẾT</h2>

    <form method="POST">
        <label>Điểm chuyên cần (10%):</label>
        <input type="number" name="cc" min="0" max="10"
               step="any"
               value="<?= htmlspecialchars($cc, ENT_QUOTES, 'UTF-8') ?>">

        <label>Điểm giữa kỳ (30%):</label>
        <input type="number" name="mid" min="0" max="10"
               step="any"
               value="<?= htmlspecialchars($mid, ENT_QUOTES, 'UTF-8') ?>">

        <label>Điểm cuối kỳ (60%):</label>
        <input type="number" name="final" min="0" max="10"
               step="any"
               value="<?= htmlspecialchars($final, ENT_QUOTES, 'UTF-8') ?>">

        <button type="submit">Tính điểm tổng kết</button>
    </form>

    <?php if ($loi !== ""): ?>
        <p class="loi">
            <?= htmlspecialchars($loi, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <?php if ($diemTong !== null): ?>
        <div class="ketqua">
            <h3>KẾT QUẢ</h3>
            <p>Điểm tổng kết:
                <strong><?= number_format($diemTong, 2) ?></strong>
            </p>
            <p>Công thức: Chuyên cần × 10% + Giữa kỳ × 30% + Cuối kỳ × 60%</p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
