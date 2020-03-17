<?php
$mysql = mysqli_connect("localhost","root","123123","id");
$id = $_POST['id'];
$pw = $_POST['pw'];
$query = "insert into member (id, pw) values ('$id', '$pw')";
$result = $mysql->query($query);
$check = "SELECT * from login WHERE id = '$id'";
$result2 = $mysql->query($check);

if($result2->num_rows==1)
{
    echo "중복 id";
    echo "<a href=register.html> 이전 페이지 </a>";
    exit();
}

$signup=mysqli_query($mysql,"INSERT INTO login (id,pw) VALUES ('$id','$pw')");
if($signup){
    echo "가입 성공";
    echo "<a href=form.html> 첫 페이지 </a?";
}

?>