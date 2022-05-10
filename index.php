<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>location.replace('login.php');</script>";
} else {
  $username = $_SESSION['username'];
 // $phone = $_SESSION['phone'];
}

include 'config.php'
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> 전자 명부 대시보드 </title>

  <!-- CSS Link -->
  <link rel="stylesheet" href="./assets/bootstrap.css">
  <link rel="stylesheet" href="./assets/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/custom.min.css">
  <link rel="stylesheet" href="./assets/prism-okaidia.css">
  <link rel="stylesheet" href="./assets/_variables.scss">
  <link rel="stylesheet" href="./assets/_bootswatch.scss">

  <!-- <link rel="stylesheet" href="./assets/style.css"> -->

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
    }

    /* 표시 건수수 설정 */
    div.dataTables_length {
      text-align : left !important;
      font-size: 12px;
    }

    /* 필터링 (검색) */
    div.dataTables_filter {
      text-align : right !important;
      font-size: 12px;
    }

    div.dataTables_filter input {
      width: 140px !important;
    }

    /* 데이터 정보 */
    div.dataTables_info {
      text-align : left !important;
      font-size: 12px;
    }

    /* 페이지네이션 */
    div.dataTables_paginate {
      text-align : right !important;
      font-size: 12px;
      padding-top: 5px;
    }

    table.dataTable td {
      vertical-align: middle;
    }

    .table td {
      padding: 10px;
    }

  </style>

</head>
<body>
<!-- header -->
<header class="container">
  <div class="row d-flex justify-content-end">
    <div class="col-3 col-sm-2"  style="padding: 0;">
      <p class="" style="font-size:13px; line-height: 50px; text-align: right; margin:0"><?php echo "관리자 : $username"; ?></p>
    </div>
    <div class="col-3 col-sm-1" style="font-size: 12px; line-height: 50px; height:50px;">
      <button type="button" class="btn btn-sm" style="font-size:12px;" onclick="location.href='logout.php'">LOGOUT</button>
    </div>
  </div>
</header>
<!-- header end -->
<!-- contents -->
<div class="container"  style="margin-top: 50px" >
  <div class="bs-docs-section">
    <div class="row">
      <div class="page-header">
        <h1 id="tables">Tables</h1>
        <div class="row d-flex justify-content-end" style="margin: 20px 0;">
          <!-- search: from date -->
          <div class="col-12 col-md-4 col-lg-3 mb-2" style="padding: 0 5px 0 0; box-sizing: border-box;">
            <form class="">
              <div class="input-group date" id="picker1">
                <input type="text" class="form-control" id="from_date" placeholder="FROM DATE"/>
                <span class="input-group-append" style="cursor: pointer;">
                  <span class="input-group-text bg-light d-block">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
            </form>
          </div>

          <!-- search: to date -->
          <div class="col-12 col-md-4 col-lg-3 mb-2" style="padding: 0 5px 0 0; box-sizing: border-box;">
            <form class="">
              <div class="input-group date" id="picker2" >
                <input type="text" class="form-control" id="to_date" placeholder="TO DATE"/>
                <span class="input-group-append" style="cursor: pointer;">
                <span class="input-group-text bg-light d-block">
                  <i class="fa fa-calendar"></i>
                </span>
                </span>
              </div>
            </form>
          </div>

          <!-- search button -->
          <div class="col col-lg-2 d-grid p-0" style="height: 50px; margin-right: 5px; box-sizing: border-box;">
            <button type="button" id="search" class="btn btn-primary btn-block">Search</button>
          </div>

          <!-- search button(all) -->
          <div class="col col-lg-1 d-grid p-0" style="height: 50px; margin-right: 0">
            <button type="button" class="btn btn-primary btn-block" onClick="window.location.reload()">All</button>
          </div>
        </div>

        <!-- table start -->
        <div class="bs-component">
          <table class="table table-hover table-light display dataTable text-center" id="dbtable" style="font-size: 0.8em;">
            <thead>
              <tr>
                <th>No</th>
                <th>Date</th>
                <th>Time</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Addr</th>
                <th>Gender</th>
                <th>Temp</th>
                <th>Accuracy</th>
                <th>Image</th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- table end -->
      </div>
    </div>
  </div>

  <!-- chart -->
  <div class="bs-docs-section" style="margin-top: 30px">
    <!-- pie chart start  -->
    <div class="row">
      <h1 style="color: ">chart</h1>
      <div class="col-md-12 col-lg-4">
        <iframe src="http://20.200.184.152:3000/d-solo/g1gFgyw7k/dashboard-img?orgId=1&refresh=5m&from=1651613292113&to=1651634892113&theme=light&panelId=8" width="100%" height="300" frameborder="0"></iframe>
      </div>
      <div class="col-md-12 col-lg-4">
        <iframe src="http://20.200.184.152:3000/d-solo/g1gFgyw7k/dashboard-img?orgId=1&refresh=5m&from=1651430034177&to=1651451634178&theme=light&panelId=10" width="100%" height="300" frameborder="0"></iframe>
      </div>
      <div class="col-md-12 col-lg-4">
        <iframe src="http://20.200.184.152:3000/d-solo/g1gFgyw7k/dashboard-img?orgId=1&refresh=5m&from=1651429995128&to=1651451595129&theme=light&panelId=6" width="100%" height="300" frameborder="0"></iframe>
      </div>
    </div>
    <!-- pie chart end -->
  </div>

  <div class="bs-docs-section" style="margin-top: 30px">
    <!-- time series graph start -->
    <div class="row">
      <div class="col-12">
        <iframe src="http://20.200.184.152:3000/d-solo/g1gFgyw7k/dashboard-img?orgId=1&refresh=5m&theme=light&panelId=2" width="100%" height="300" frameborder="0"></iframe>
      </div>
      <div class="col-12">
        <iframe src="http://20.200.184.152:3000/d-solo/g1gFgyw7k/dashboard-img?orgId=1&theme=light&panelId=11" width="100%" height="300" frameborder="0"></iframe>
      </div>
    </div>
    <!-- time series graph end -->
    </div>
</div>
<!-- footer -->
<div style="background: #888; height: 80px; text-align: right; margin-top: 50px;">
  <p style="font-size: 12px; color: #fff; margin-right: 10px; padding-top: 10px">© 2022 한국직업능력교육원 클라우드반 Project B조</p>
</div>
<!-- footer end -->

<!-- Script -->
<script>
  const today = new Date();

  $(document).ready(function(){
    //Datepicker
    $("#picker1").datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      endDate: today,
      clearBtn: true,
      showWeekDays: true,
      todayHighlight: true,
      todayBtn: "linked",
      toggleActive: true,
      language: 'ko',
    }).on('changeDate', function(selected){
      var startDate = new Date(selected.date.valueOf());
      $('#picker2').datepicker('setStartDate', startDate);
    }).on('clearDate', function(selected){
      $('#picker2').datepicker('setStartDate', null);
    });

    $("#picker2").datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      endDate: today,
      clearBtn: true,
      showWeekDays: true,
      todayHighlight: true,
      todayBtn: "linked",
      toggleActive: true,
      language: 'ko'
    }).on('changeDate', function(selected){
      var endDate = new Date(selected.date.valueOf());
      $('#picker1').datepicker('setEndDate', endDate);
    }).on('clearDate', function(selected){
      $('#picker1').datepicker('setEndDate', null);
    });

    // jQuery(document).ready(function () {
    var dataTable = $('#dbtable').DataTable({
      //'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'responsive': true,
      'lengthMenu': [ [10, 20, 50, 100], [10, 20, 50, 100] ],
      'pageLength': 20,
      'searching': true,  // 검색 기능
      'autoWidth': false, // 가로 길이 자동 설정
      'scrollX': true,    // 가로 스크롤
      'pagingType': 'simple_numbers',
      'ajax': {
        'url': 'filter.php',
        'data': function(data){
          // Read values
          var from_date = $('#from_date').val();
          var to_date = $('#to_date').val();

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate = to_date;
        }
      },
      // "paginate":true,
      // "paginationType":"full_numbers",
      // "displayLength": 10,
      // "lengthChange":false,
      // "filter": false,
      language: {
        emptyTable: "데이터가 없습니다.",
        lengthMenu: "페이지당 _MENU_ 개씩 보기",
        info: "현재 _START_ - _END_ / _TOTAL_건",
        infoEmpty: "데이터 없음",
        infoFiltered: "( _MAX_건의 데이터에서 필터링됨 )",
        // search: "",
        zeroRecords: "일치하는 데이터가 없습니다.",
        loadingRecords: "로딩중...",
        processing: "잠시만 기다려 주세요.",
        // paginate: {
        //   next: "다음",
        //   previous: "이전",
        // },
      },
      'columns': [
        { data: 'No'},
        { data: 'Date'},
        { data: 'Time'},
        { data: 'person_name'},
        { data: 'phone_num'},
        { data: 'addr'},
        { data: 'sex'},
        { data: 'temperature'},
        { data: 'accuracy'},
        { data: 'img'}
      ],
      'dom': "<'row'<'col-5'l><'col-7'f>>" + "<'row'<'col-12'i>t<'col-12'p>>",
    });

    // Search button
    $('#search').click(function(){
      dataTable.draw();
    });
  });

</script>
</body>
</html>                        