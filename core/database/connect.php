<?php 
$connect_error = 'Sorry we are experiencing a connection issue.';

mysql_connect('localhost','joshuag_joshuag','volcano4') or die('not connected');
mysql_select_db('joshuag_grubnums') or die('no db');

/*$result = mysql_query("show tables"); // run the query and assign the result to $result
while($table = mysql_fetch_array($result)) { // go through each row that was returned in $result
    echo($table[0] . "<BR>");    // print the table that was returned on that row.
}
*/

?>