<?php
include_once '../../common_lib/createLink_db.php';
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="../css/start_area1.css?var=1">
<script type="text/javascript">
function select_area(city){
	window.opener.ticket_form.back.value=city;
	window.close();
} 

function trs(url){
	
	location.href=url;
}
</script>
</head>
<body>
<div style="margin-left:100px;"><h2>지역과 도시를 선택해주세요</h2>
</div>
<div id="box">

<table id="table1">
<tr>
<td class="td1"><a class="a1" href="start_area.php?country=대한민국"><div class="td_div" onclick="trs('back_area.php?country=대한민국')">대한민국</div></a></td>
<td rowspan="6" class="td2">
<div id="select_city"><p style="font-weight: 800">해당 도시 취항지 검색</p>
<?php 

if($_GET['country']){
    $country  = $_GET['country'];
}else{
    $country = "대한민국";
}

$sql = "select * from country where area='$country'";


$result = mysqli_query($con,$sql) or die("실패원인 : ".mysqli_error($con));
$i=0;
while($row = mysqli_fetch_array($result)){
$city[$i] = $row[city];
?>
<a  href='#' onclick="select_area('<?=$city[$i] ?>')" class="a2"><?=$city[$i]?></a><br><div>
<?php 
$i++;
}
?>
</td>
</tr>
<tr>
<td class="td1"><a class="a1" href="back_area.php?country=아시아"><div class="td_div" onclick="trs('back_area.php?country=아시아')">아시아</div></a></td>
</tr>
<tr>
<td class="td1"><a class="a1" href="back_area.php?country=아메리카"><div class="td_div" onclick="trs('back_area.php?country=아메리카')">아메리카</div></a></td>
</tr>
<tr>
<td class="td1"><a class="a1" href="back_area.php?country=유럽"><div class="td_div" onclick="trs('back_area.php?country=유럽')">유럽</div></a></td>
</tr>
<tr>
<td class="td1"><a class="a1" href="back_area.php?country=아프리카"><div class="td_div" onclick="trs('back_area.php?country=아프리카')">아프리카</div></a></td>
</tr>
<tr>
<td class="td1"><a class="a1" href="back_area.php?country=오세아니아"><div class="td_div" onclick="trs('back_area.php?country=오세아니아')">오세아니아</div></a></td>
</tr>
</table>
</div>
</body>
</html>

<?php


?>