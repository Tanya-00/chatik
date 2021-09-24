<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
</head>
<body>
<?php
$login=$_GET['login'];
$password=$_GET['password'];

$usersArray = array (
    "admin1"=>"1234",
    "admin2"=>"5678",
    "admin3"=>"9012"
);
$message=$_GET['message'];
$date = date('Y-m-d H:i:s');
if($usersArray[$login]  === $password) {
    $data=array (
        'login'=>$login,
        'message'=>$message,
        'date'=>$date
    );
    $dataMess=json_decode(file_get_contents('dataMess.json'));
    array_push($dataMess->h, $data);
    file_put_contents('dataMess.json', json_encode($dataMess));
}
else {
    echo "There's a mistake somewhere";
}
$data=json_decode(file_get_contents('dataMess.json'));

for ($i=0; $i < sizeof($data->messages); $i++) {
    echo $data->messages[$i]->$login;
    echo "</br>";
    echo $data->messages[$i]->$message;
    echo "</br>";
    echo $data->messages[$i]->$date;
    echo "</br>";
    echo "**************************";
    echo "</br>";
}
?>
</body>
</html>