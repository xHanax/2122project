<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>전자 명부 대시보드</title>

  <!-- CSS Link -->
  <link rel="stylesheet" href="./assets/bootstrap.css">
  <link rel="stylesheet" href="./assets/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/custom.min.css">
  <link rel="stylesheet" href="./assets/prism-okaidia.css">
  <link rel="stylesheet" href="./assets/_variables.scss">
  <link rel="stylesheet" href="./assets/_bootswatch.scss">

  <!-- Font Awesome --> 
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Tempusdominus Bootstrap 4 --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">


  <!-- JS LInk -->
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <!-- Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- Bootstrap Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ko.min.js"></script>
  <!-- Bootstrap pagination -->
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <!--  -->
  <link rel="stylesheet" href="./assets/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="./assets/prism.js">
  <link rel="stylesheet" href="./assets/custom.js">


  <!-- font -->
  <style>
    @font-face {
      font-family: 'NanumBarunGothic';
      font-style: normal;
      font-weight: 400;
      src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot');
      src: url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.eot?#iefix') format('embedded-opentype'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.woff') format('woff'), url('//cdn.jsdelivr.net/font-nanumlight/1.0/NanumBarunGothicWeb.ttf') format('truetype');
    }

    body {
      font-family: 'NanumBarunGothic';
      background: linear-gradient(to bottom, #A0B8C5 146px, #EEF2F3 546px);
      height: 100vh;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-6 mb-5">
        <img src="http://jangjh4556.iptime.org:59000/?action=stream" width="100%"/>
      </div>
      <div class="col-12 col-lg-4">
      <form method="post" action="login_check.php" id="loginform">
        <fieldset class="d-grid">
          <legend>LOGIN</legend>
          <div class="form-group">
            <label for="username" class="form-label mt-4">NAME</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="이름을 입력하세요.">
          </div>
          <div class="form-group">
            <label for="phone" class="form-label mt-4">PASSWORD</label>
            <input type="password" class="form-control" name="phone" id="phone" placeholder="전화번호 끝자리 4개를 입력하세요.">
          </div>
          <!-- <div class="form-group">
            <p class="form-label mt-4">성별</p>
            <div class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="gender" id="man" value="man">
              <label class="form-check-label" for="man">남</label>
            </div>
            <div iv class="form-check form-check-inline">
              <input type="radio" class="form-check-input" name="gender" id="woman" value="woman">
              <label class="form-check-label" for="woman">여</label>
            </div>
          </div> -->
          <button type="submit" class="btn btn-primary btn-block mt-4" onclick="button()">LOGIN</button>
        </fieldset>
      </form>
    </div>
    </div>
  </div>
</body>
</html>
