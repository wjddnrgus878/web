<?php
    session_start();
    $mysql = mysqli_connect("localhost","root","123123","id"); // databse 정보
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $query = "select * from login where id='$id'"; // query 문 (login 테이블 내의 id에서 $id 탐색)
    $result = $mysql->query($query); // mysql에 적시된 database에 query 전송
    $count = mysqli_num_rows($result); // database 내에 쿼리를 보내 레코드의 개수 측정
    
    if($count==1){ // id가 존재하면

        $record=$result->fetch_array(MYSQLI_ASSOC); // 레코드 받아오기

        if($record['pw']==$pw){
            $_SESSION['id']=$id;
            if(isset($_SESSION['id']))
            {
                echo "로그인 성공";
                header('index.php');
            }
            else
            {
                echo "세션 저장 실패";
            }
        }
        else
        {
            echo "pw 오류";
        }
    }
    else
    {
        echo "id 오류";
    }
?>