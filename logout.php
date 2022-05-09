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
  session_destroy();
  ?>
  <script>
    alert("====== 로그아웃 ======");
    location.replace('index.php');
  </script>
</body>
</html>
