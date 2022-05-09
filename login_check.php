<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>전자 명부 대시보드</title>

</head>
<body>
  <?php 
    session_start();

    $con = mysqli_connect('20.200.184.152:43309', 'jj', '1234', 'projectB');

    $username = $_POST['username'];
    $phone = $_POST['phone'];

    $res = mysqli_query($con, "select person_name from person_info where person_name = '$username' and phone_num like '%$phone';");
    $row = mysqli_fetch_array($res);

    if($row != null){
      $_SESSION['username'] = $row['person_name'];
      echo "<script>location.replace('index.php');</script>";
      exit;
    }

    if($row == null){
      echo "<script>alert('로그인 실패 : 다시 입력하세요')</script>";
      echo "<script>location.replace('login.php');</script>";
      exit;
    }
  ?>
</body>
</html>
