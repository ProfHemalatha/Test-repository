<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

//// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection and return an error description from the last connection error,if any
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query
$sql = "SELECT * FROM students";
//$conn->query($sql) sends the SQL query to the database, $conn is an instance of the mysqli class 
$result = $conn->query($sql);


//$result->num_rows: Checks how many rows were returned by the query
if ($result->num_rows > 0) {

    // initialising an empty array to Store record in an array
    $students = [];
    //The fetch_assoc() method fetches the next row of the result set as an associative array.
    //The while loop iterates over all rows in the result set.
    while ($row = $result->fetch_assoc()) {
        //$students[] = $row; adds the current row (as an associative array) to the $students array.
        $students[] = $row;
    }

}

// Selection sort function
function selectionSort(&$arr, $key)
{
    $n = count($arr);
    //Loops through the array 
    for ($i = 0; $i < $n - 1; $i++) {
        //$minIndex: Stores the index of the current minimum element, initialized to $i
        $minIndex = $i;

        //Compares the current element ($array[$j][$key]) with the minimum element found so far ($array[$minIndex][$key]).
         //If a smaller element is found, updates $minIndex to the index of that element
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j][$key] < $arr[$minIndex][$key]) {
                $minIndex = $j;
            }
        }
    //After the inner loop completes, swaps the smallest element with the element at index $i.
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
}

selectionSort($students, 'name');
?>
