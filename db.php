<?PHP
function db_connect()
{
	
	// https://p3nlmysqladm001.secureserver.net/grid50/2197?uniqueDnsEntry=disblogveztekusa.db.6167913.hostedresource.com
//echo "HERE";
	$dbuser = "topoftheline";   // online un : disblogveztekusa     // read only un : veztekusaro
	$dbpass = "a2%tR0abQm";   // "D_pword1";
	$dbhost = "topoftheline.db.9729033.hostedresource.com"; 
	$dbname = "topoftheline";   // online db name : disblogveztekusa
	
	/*$dbuser = "disblogveztekusa";
	$dbpass = "D_pword1";
	$dbhost = "disblogveztekusa.db.6167913.hostedresource.com"; 
	$dbname = "disblogveztekusa";*/
	
	/*$dbuser = "mosquefinder";
	$dbpass = "iPhone332";
	$dbhost = "mosquefinder.db.5374247.hostedresource.com"; 
	$dbname = "mosquefinder";*/
//connection to the database
	$conn = mysql_connect($dbhost,$dbuser, $dbpass);
        if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
echo "Connected";
	mysql_select_db($dbname, $conn);
	return $conn;
}
$conn = db_connect();
?>