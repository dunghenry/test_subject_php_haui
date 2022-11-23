<?php
include 'connectdb.php';
$id = $_GET['id'];
$sql = "SELECT * FROM tblhousehold WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ten = $row['ten'];
$thang = $row['thang'];
$csd = $row['chisodau'];
$csc = $row['chisocuoi'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ht = $_POST['hoten'];
    $ht = str_replace(' ', '', $ht);
    $t = (int)$_POST['thang'];
    $d = (int)$_POST['csd'];
    $c = (int)$_POST['csc'];
    if ($csc < $csd || $thang < 0 || $thang > 12) {
        echo "Dữ liệu không hợp lệ";
    } else {
        $sql = "update `tblhousehold` set ten='$ht', thang='$t',chisodau='$d', chisocuoi='$c' WHERE id='$id'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            // echo "Update user successfully";
            header('location:display.php');
        } else {
            echo "Update user failed";
            die(mysqli_error($conn));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>UPDATE PAGE</title>
</head>

<body>
    <div class="container my-5">
        <h1>UPDATE ITEM</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Họ tên : </label>
                <input type="text" name="hoten" value=<?php echo $ten ?> class="form-control" placeholder="Họ và Tên" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Tháng: </label>
                <input type="number" name="thang" value=<?php echo $thang ?> min="1" max="12" class="form-control" placeholder="Tháng" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Chỉ số đầu: </label>
                <input type="number" name="csd" min="0" value=<?php echo $csd ?> class="form-control" placeholder="Chỉ số đầu" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Chỉ số cuối: </label>
                <input type="number" name="csc" min="0" value=<?php echo $csc ?> class="form-control" placeholder="Chỉ số cuối" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

</body>

</html>