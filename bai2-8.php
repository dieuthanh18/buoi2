
<?php
// 1. Tao mang gom 3 sinh vien
$students = [
    [
        "name" => "Nguyen Van An",
        "midterm" => 8,
        "final" => 9
    ],
    [
        "name" => "Tran Thi Binh",
        "midterm" => 6,
        "final" => 7
    ],
    [
        "name" => "Le Van Chi",
        "midterm" => 4,
        "final" => 3
    ]
];

// 2. Ham tinh diem trung binh
function calculateAverage(float $midterm, float $final): float {
    return ($midterm + $final) / 2;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điểm sinh viên</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #16864b;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #16864b;
            color: white;
        }

        .dat {
            color: green;
            font-weight: bold;
        }

        .truot {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>BẢNG ĐIỂM 3 SINH VIÊN</h2>

    <table>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Điểm giữa kỳ</th>
            <th>Điểm cuối kỳ</th>
            <th>Điểm trung bình</th>
            <th>Kết quả</th>
        </tr>

        <?php
        // 3. Dung foreach de in bang HTML
        foreach ($students as $index => $student):

            $average = calculateAverage(
                $student["midterm"],
                $student["final"]
            );

            // 4. Xep loai ket qua
            $result = ($average >= 5) ? "Đạt" : "Chưa đạt";
        ?>

        <tr>
            <td><?= $index + 1 ?></td>

            <td>
                <?= htmlspecialchars(
                    $student["name"],
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </td>

            <td><?= $student["midterm"] ?></td>

            <td><?= $student["final"] ?></td>

            <td><?= number_format($average, 2) ?></td>

            <td class="<?= $average >= 5 ? 'dat' : 'truot' ?>">
                <?= $result ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

</div>
</body>
</html>
