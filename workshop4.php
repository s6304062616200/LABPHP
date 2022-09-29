
<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <div style="display:flex">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
        if (!empty($_GET)) // ถ ้ามีค่าที่สงมาจากฟอร์ม ่
            $value = '%' . $_GET["keyword"] . '%'; // ดึงค่าที่สงมาก าหนดให ้กับตัวแปรเงื่อนไข ่
        $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้
        $stmt->execute(); // เริ่มค ้นหา
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <div>
                <img src='member/<?= $row["mid"] ?>.jpg' width='100'><br>
                ชื่อสมาชิก: <?= $row["name"] ?><br>
                ที่อยู่ :<?= $row["address"] ?><br>
                อีเมล์ :<?= $row["email"] ?> <hr>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>