<?php
if (isset($_POST['btn_notify'])) {
    $email = $_POST['email'];
    $messege = $_POST['messege'];

    $sToken = "Gx0ELq8Bu1A0rWbgf33kM1IZGx2wJOmWSnXF9DKgrEC";
    $sMessage = "รายละเอียดการรีวิว\n";
    $sMessage .= "อีเมล: " . $email . "\n";
    $sMessage .= "ข้อความ: " . $messege . "\n";


    $chOne = curl_init();
    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($chOne, CURLOPT_POST, 1);
    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($chOne);

    //Result error 
    if (curl_error($chOne)) {
        echo 'error:' . curl_error($chOne);
    } else {
        $result_ = json_decode($result, true);
        echo "status : " . $result_['status'];
        echo "message : " . $result_['message'];
    }
    curl_close($chOne);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>Hello, world!</title>
</head>

<body>

    <div class="container text-center mt-5">
        <h1>Messege Line Notify</h1>
        <hr class="mt-4 mb-3">
        <div class="text-start" style="padding: 10px 300px;">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="กรอกอีเมล example@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ข้อความ</label>
                    <textarea class="form-control" name="messege" id="exampleFormControlTextarea1" rows="3" placeholder="กรอกข้อความ abcdefg12345"></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" name="btn_notify" class="btn btn-success">ส่งข้อความ</button>
                </div>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>