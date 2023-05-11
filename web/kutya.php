<?php
$dbconn = mysqli_connect("localhost", "root", "", "users") or die ("off");
$query = mysqli_query($dbconn,"select * from animals");

while($r = mysqli_fetch_assoc($query))
{
    $kep = $r['pic'];
}

echo '<form method=POST action="kutya.php">';
    echo '<img src="'.$kep.'">';
    echo '<input type="submit">';
echo '</form>';

?>