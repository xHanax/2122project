<?php 
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($con,$_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($con,$_POST['searchByTodate']);

## Search 
$searchQuery = "";
if($searchValue != ''){
    $searchQuery = " and (Date like '%".$searchValue."%' or person_name like '%".$searchValue."%' or phone_num like'%".$searchValue."%' or state like '%".$searchValue."%' ) ";
}

## Date filter
if($searchByFromdate != '' && $searchByTodate != ''){
  $searchQuery .= " and (Date between '".$searchByFromdate."' and '".$searchByTodate."') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from electronic_list");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from electronic_list WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from electronic_list WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
  $data[] = array(
    "No"=>$row['No'],
    "Date"=>$row['Date'],
    "Time"=>$row['Time'],
    "person_name"=>$row['person_name'],
    "phone_num"=>$row['phone_num'],
    "addr"=>$row['addr'],
    "sex"=>$row['sex'],
    "temperature"=>$row['temperature'],
    "accuracy"=>$row['accuracy'],
    "img"=>'<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" />',
  );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
die;



/* 페이징 (검색X)
$resultset = mysqli_query($con, "select * FROM electronic_list;") or die("database error:". mysqli_error($con));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$data[] = $rows;
}

$results = array(
	"echo" => 1,
  "totalRecords" => count($data),
  "totalDisplayRecords" => count($data),
  "aaData"=>$data);
echo json_encode($results);
exit;
*/


?>
