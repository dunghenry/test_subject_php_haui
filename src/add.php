<?php
include "connectdb.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST['hoten'];
    $hoten = str_replace(' ', '', $hoten);
    $thang = (int)$_POST['thang'];
    $csd = (int)$_POST['csd'];
    $csc = (int)$_POST['csc'];
    if ($csc < $csd || $thang < 0 || $thang > 12) {
        echo "Dữ liệu không hợp lệ";
    } else {
        $sql = "insert into `tblhousehold` (ten,thang,chisodau,chisocuoi) values('$hoten','$thang','$csd','$csc')";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            header('location:display.php');
        } else {
            echo "Create user failed";
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
    <title>ADD PAGE</title>
</head>

<body>
    <div class="container my-5">
        <h1>ADD ITEM</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label class="form-label">Họ tên : </label>
                <input type="text" name="hoten" class="form-control" placeholder="Họ và Tên" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Tháng: </label>
                <input type="number" name="thang" min="1" max="12" class="form-control" placeholder="Tháng" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Chỉ số đầu: </label>
                <input type="number" name="csd" min="0" class="form-control" placeholder="Chỉ số đầu" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Chỉ số cuối: </label>
                <input type="number" name="csc" min="0" class="form-control" placeholder="Chỉ số cuối" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

</body>

</html>