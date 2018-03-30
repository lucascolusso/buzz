<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO responses (user_ip, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10)
VALUES ('$_SERVER[REMOTE_ADDR]','$_POST[Q1]','$_POST[Q2]','$_POST[Q3]','$_POST[Q4]','$_POST[Q5]','$_POST[Q6]','$_POST[Q7]','$_POST[Q8]','$_POST[Q9]','$_POST[Q10]');";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

#$responses = array("Q1" => , "Q2" => $_POST["Q2"],"Q3" => $_POST["Q3"],"Q4" => $_POST["Q4"],"Q5" => $_POST["Q5"],"Q6" => $_POST["Q6"],"Q7" => $_POST["Q7"],"Q8" => $_POST["Q8"],"Q9" => $_POST["Q9"],"Q10" => $_POST["Q10"]);



$conn->close();


$array = array(
    0 => array(
        'url' => 'C3P0',
        'rating' => $_POST["Q1"]
    ),
    1 => array(
        'url' => 'Imwe',
        'rating' => $_POST["Q2"]
    ),
    2 => array(
        'url' => 'Luke',
        'rating' => $_POST["Q3"]
    ),
    3 => array(
        'url' => 'Yoda',
        'rating' => $_POST["Q4"]
    ),
    4 => array(
        'url' => 'Leia',
        'rating' => $_POST["Q5"]
    ),
    5 => array(
        'url' => 'HanSolo',
        'rating' => $_POST["Q6"]
    ),
    6 => array(
        'url' => 'Jabba',
        'rating' => $_POST["Q7"]
    ),
    7 => array(
        'url' => 'Hux',
        'rating' => $_POST["Q8"]
    ),
    8 => array(
        'url' => 'Palpatine',
        'rating' => $_POST["Q9"]
    ),
    9 => array(
        'url' => 'Holdo',
        'rating' => $_POST["Q10"]
    )
);

function shuffle_assoc($array)
{
    $shuffled_array = array();

    $shuffled_keys = array_keys($array);
    shuffle($shuffled_keys);

    foreach ( $shuffled_keys AS $shuffled_key ) {

        $shuffled_array[  $shuffled_key  ] = $array[  $shuffled_key  ];

    }


    return $shuffled_array;
}


$value = max(array_column($array, 'rating'));

$array = shuffle_assoc($array);

foreach ($array as $item) {
    if ($item['rating'] == $value) {
        $redirect_url = $item[url];
        break;
    }
}

header('Location: http://buzz.hcde.uw.edu/quizzes/starquiz_'.$redirect_url.'.html');
die();

?>
