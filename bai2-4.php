
<?php
// Tao mang ket hop gom 3 sinh vien
$students = [
    [
        "name" => "An",
        "score" => 8.0
    ],
    [
        "name" => "Binh",
        "score" => 6.5
    ],
    [
        "name" => "Chi",
        "score" => 4.5
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Mang sinh vien PHP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 25px;
            background: white;
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

        tr:nth-child(even) {
            background: #f2f8f3;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>DANH SÁCH SINH VIÊN</h2>

    <table>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Điểm</th>
        </tr>

        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($student["name"], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= htmlspecialchars((string)$student["score"], ENT_QUOTES, "UTF-8") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
