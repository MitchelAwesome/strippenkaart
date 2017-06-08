<?php
/**
 * Created by PhpStorm.
 * User: mitchelaustin
 * Date: 29/04/2017
 * Time: 17:46
 */


/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=blo;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    echo 'connected';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if($_GET['exe'] != 1)
{
    die('nothing executed. add ?exe=1');
}

$query = $db->prepare("INSERT INTO school
(name,address,district,tel,email,created_at,updated_at)
VALUES(:name,:address,:district,:tel,:email,:created_at,:updated_at)
");

$row = 0;
if (($handle = fopen("Schools.csv", "r")) !== FALSE)
{
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
    {
        //$num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        //$row++;
        //for ($c=0; $c < $num; $c++) {
        //    echo $data[$c] . "<br />\n";
       // }

        //echo $data['0'].' 1 //name <br>';
        //echo $data['1'].' 2 //address <br>';
        //echo $data['2'].' 3 //district <br>';
        //echo $data['3'].' 4 //tel <br>';
        //echo $data['4'].' 5 //email <br>';
        //echo '<br>';

//
//        $query->bindParam(':name',$data[0]);
//        $query->bindParam(':address',$data[1]);
//        $query->bindParam(':district',$data[2]);
//        $query->bindParam(':tel',$data[3]);
//        $query->bindParam(':email',$data[4]);
//        $query->bindParam(':updated_at',date('Y-m-d'));
//        $query->bindParam(':created_at',date('Y-m-d'));
//
//        if($query->execute())
//        {
//            echo "<p>row:$row  inserted <br /></p>\n";
//        }
//
//        $row ++;

    }

    fclose($handle);
}


//$query = $db->prepare();


?>