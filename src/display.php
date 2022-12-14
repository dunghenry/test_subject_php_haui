<?php
include 'connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>ELECTRIC</title>
</head>

<body>
    <div class="container my-5">
        <h1>ALL ITEM</h1>
        <button class="btn btn-primary">
            <a href="add.php" class="text-light text-decoration-none">To add page</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT(id)</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">Tháng</th>
                    <th scope="col">Chỉ số đầu</th>
                    <th scope="col">Chỉ số cuối</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"> Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tblhousehold";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $hoten = $row['ten'];
                        $thang = $row['thang'];
                        $csd = $row['chisodau'];
                        $csc = $row['chisocuoi'];
                        $rs = $csc - $csd;
                        $money;
                        $total;
                        if ($rs <= 50) {
                            $money = $rs * 1678;
                            $total = $money + $money * (10 / 100);
                        } else if ($rs <= 100) {
                            $money = 50 * 1678 + ($rs - 50) * 1734;
                            $total = $money + $money * (10 / 100);
                        } else if ($rs <= 200) {
                            $money = 50 * 1678 + 50 * 1734 + ($rs - 100) * 2014;
                            $total = $money + $money * (10 / 100);
                        } else if ($rs <= 300) {
                            $money = 50 * 1678 + 50 * 1734 +  100 * 2014 + ($rs - 200) * 2536;
                            $total = $money + ($money * (10 / 100));
                        } else if ($rs <= 400) {
                            $money = 50 * 1678 + 50 * 1734 +  100 * 2014 +  100 * 2536 + ($rs - 300) * 2834;
                            $total = $money + ($money * (10 / 100));
                        } else {
                            $money = 50 * 1678 + 50 * 1734 +  100 * 2014 +  100 * 2536 + 100 * 2834 + ($rs - 400) * 2927;
                            $total = $money + ($money * (10 / 100));
                        }
                        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $hoten . '</td>
                <td>' . $thang . '</td>
                <td>' . $csd . '</td>
                <td>' . $csc . '</td>
                <td>' . number_format($total, 1, '.', ',') . '&nbsp;đ</td>
                <td>
                    <button class="btn btn-primary"><a href="update.php?id=' . $id . '" class="text-light text-decoration-none">Edit</a></button>&nbsp;&nbsp;&nbsp;
                    <button type="button" onclick=myFunction(' . $id . ') class="btn btn-warning text-light">
                        Delete
                    </button>
                </td>
               </tr>';
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function myFunction(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Deleted successfully!", {
                            icon: "success",
                        });
                        setTimeout(() => {
                            window.location = `delete.php?id=${id}`
                        }, 500)
                    } else {}
                });

        }
    </script>
</body>

</html>

</body>

</html>