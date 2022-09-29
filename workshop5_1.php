<?php
$pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>

<head>
    <meta charset="utf-8">
</head>
<?php
// 1. ก าหนดค าสง



$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็นเงื่อนไข
$stmt->execute(); // 3. เริ่มค ้นหา
$row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<div style="display:flex">
    <div>
        <img src='member/<?= $row["mid"] ?>.jpg' width='200'>
    </div>
    <div style="padding: 15px">
                  ชื่อสมาชิก: <?= $row["name"] ?><br>
                  ที่อยู่ :<?= $row["address"] ?><br>
                  อีเมล์ :<?= $row["email"] ?> <hr>
    </div>
</div>
</body>

</html>