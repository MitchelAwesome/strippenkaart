<?php
/**
 * Created by PhpStorm.
 * User: mitchelaustin
 * Date: 08/06/2017
 * Time: 13:26
 */

$list=array();
$month = date('m');
$year = date('Y');

for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);
    if (date('m', $time)==$month)
        $list[]=date('d-M', $time);
}




echo "<pre>";
print_r($list);
echo "</pre>";

?>

<table>
    <tr>
        <th></th>
    </tr>
</table>
