<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div style="display:flex">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <div style="padding: 15px; text-align: center">
                <a href="workshop5_1.php?username=<?= $row["username"] ?>">
                <div>
                <img src='member/<?= $row["mid"] ?>.jpg' width='100'><br>
                  ชื่อสมาชิก: <?= $row["name"] ?><br>
                  ที่อยู่ :<?= $row["address"] ?><br>
                  อีเมล์ :<?= $row["email"] ?> <hr>
              </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>