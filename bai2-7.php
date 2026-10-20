
<?php
// Ham dinh dang tien
function money(float $value): string {
    return number_format($value, 0, ',', '.') . ' d';
}

// Khoi tao du lieu
$name = "";
$qty = "";
$price = "";
$total = null;
$error = "";

// Xu ly form POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $qty = trim($_POST["qty"] ?? "");
    $price = trim($_POST["price"] ?? "");

    // Kiem tra ten tai lieu
    if ($name === "") {
        $error = "Vui long nhap ten tai lieu.";
    }
    // Kiem tra so luong
    elseif (
        filter_var($qty, FILTER_VALIDATE_INT) === false ||
        (int)$qty < 1
    ) {
        $error = "So luong phai la so nguyen lon hon hoac bang 1.";
    }
    // Kiem tra don gia
    elseif (
        $price === "" ||
        !is_numeric($price) ||
        (float)$price < 0
    ) {
        $error = "Don gia phai la so khong am.";
    }
    // Tinh thanh tien
    else {
        $qty = (int)$qty;
        $price = (float)$price;
        $total = $qty * $price;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hoa don hoc lieu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ddd;
        }

        h2 {
            text-align: center;
            color: #16864b;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #16864b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #116b3b;
        }

        .ketqua {
            margin-top: 22px;
            padding: 15px;
            background: #e5f6e8;
            border-radius: 5px;
        }

        .loi {
            margin-top: 15px;
            padding: 12px;
            color: #b42318;
            background: #fdecec;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>HÓA ĐƠN HỌC LIỆU</h2>

    <!-- Gui du lieu ve chinh trang hien tai -->
    <form method="POST" action="">

        <label for="name">Tên tài liệu:</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Nhập tên tài liệu"
            value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <label for="qty">Số lượng:</label>
        <input
            type="number"
            id="qty"
            name="qty"
            min="1"
            step="1"
            value="<?= htmlspecialchars((string)$qty, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <label for="price">Đơn giá (đồng):</label>
        <input
            type="number"
            id="price"
            name="price"
            min="0"
            step="any"
            value="<?= htmlspecialchars((string)$price, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <button type="submit">Tính thành tiền</button>
    </form>

    <!-- Hien thi loi neu du lieu khong hop le -->
    <?php if ($error !== ""): ?>
        <div class="loi">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <!-- Hien thi hoa don -->
    <?php if ($total !== null): ?>
        <div class="ketqua">
            <h3>KẾT QUẢ HÓA ĐƠN</h3>

            <p>
                Tên tài liệu:
                <strong><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></strong>
            </p>

            <p>Số lượng: <strong><?= $qty ?></strong></p>

            <p>Đơn giá: <strong><?= money($price) ?></strong></p>

            <hr>

            <p>
                Thành tiền:
                <strong><?= money($total) ?></strong>
            </p>
        </div>
    <?php endif; ?>

</div>
</body>
</html>
