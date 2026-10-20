
<?php
session_start();

// Khoi tao danh sach sinh vien ban dau
if (!isset($_SESSION["students"])) {
    $_SESSION["students"] = [
        ["id" => 1, "name" => "Nguyen Van An", "score" => 8.0],
        ["id" => 2, "name" => "Tran Thi Binh", "score" => 6.5],
        ["id" => 3, "name" => "Le Van Chi", "score" => 4.5]
    ];
}

$thongBao = "";

// Them sinh vien bang POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $score = trim($_POST["score"] ?? "");

    if ($name === "") {
        $thongBao = "Vui long nhap ho ten.";
    } elseif (!is_numeric($score) || $score < 0 || $score > 10) {
        $thongBao = "Diem phai la so tu 0 den 10.";
    } else {
        $_SESSION["students"][] = [
            "id" => count($_SESSION["students"]) + 1,
            "name" => $name,
            "score" => (float)$score
        ];

        // Chuyen huong sau khi them thanh cong
        header("Location: bai8.php");
        exit;
    }
}

// Lay danh sach sinh vien tu session
$students = $_SESSION["students"];

// Tim kiem sinh vien bang GET
$keyword = trim($_GET["keyword"] ?? "");
$filteredStudents = [];

foreach ($students as $student) {
    if (
        $keyword === "" ||
        stripos($student["name"], $keyword) !== false
    ) {
        $filteredStudents[] = $student;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quan ly sinh vien GET POST</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 25px;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #16864b;
        }

        input {
            padding: 10px;
            margin: 5px 0 12px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background: #16864b;
            color: white;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #16864b;
            color: white;
        }

        .thongbao {
            margin: 12px 0;
            color: #b42318;
        }

        .form-box {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>QUẢN LÝ SINH VIÊN</h2>

    <!-- Tim kiem bang GET -->
    <div class="form-box">
        <h3>1. Tìm kiếm sinh viên (GET)</h3>

        <form method="GET" action="bai8.php">
            <label>Nhập tên sinh viên cần tìm:</label>

            <input
                type="text"
                name="keyword"
                placeholder="Ví dụ: An"
                value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>"
            >

            <button type="submit">Tìm kiếm</button>
            <a href="bai8.php">Hiển thị tất cả</a>
        </form>
    </div>

    <!-- Them sinh vien bang POST -->
    <div class="form-box">
        <h3>2. Thêm sinh viên (POST)</h3>

        <form method="POST" action="bai8.php">
            <label>Họ tên:</label>
            <input type="text" name="name" required>

            <label>Điểm (0–10):</label>
            <input
                type="number"
                name="score"
                min="0"
                max="10"
                step="any"
                required
            >

            <button type="submit">Thêm sinh viên</button>
        </form>

        <?php if ($thongBao !== ""): ?>
            <p class="thongbao">
                <?= htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>
    </div>

    <!-- Hien thi ket qua -->
    <h3>
        3. Danh sách sinh viên
        <?php if ($keyword !== ""): ?>
            - Kết quả tìm kiếm
        <?php endif; ?>
    </h3>

    <?php if (count($filteredStudents) > 0): ?>

        <table>
            <tr>
                <th>Mã</th>
                <th>Họ tên</th>
                <th>Điểm</th>
            </tr>

            <?php foreach ($filteredStudents as $student): ?>
                <tr>
                    <td><?= (int)$student["id"] ?></td>

                    <td>
                        <?= htmlspecialchars(
                            $student["name"],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            (string)$student["score"],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p>Tìm thấy <?= count($filteredStudents) ?> sinh viên.</p>

    <?php else: ?>

        <p>Không tìm thấy sinh viên phù hợp với từ khóa:
            <strong><?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?></strong>
        </p>

    <?php endif; ?>

</div>
</body>
</html>
