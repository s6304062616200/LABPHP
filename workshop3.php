<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div>
        <?php
        $stmt = $pdo->prepare("SELECT mid, name, address, email FROM member");
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <div>
                <img src='member_photo/<?= $row["mid"] ?>.jpg' width='100'><br>
                ชื่อสมาชิก: <?= $row["name"] ?><br>
                ที่อยู่ :<?= $row["address"] ?><br>
                อีเมล์ :<?= $row["email"] ?> <hr>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>