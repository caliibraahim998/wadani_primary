<?php 
header('Content-Type: application/json');

include("config/conn.php");
//   Making Action Start Here

if(isset($_POST['action']))
{
    $action = $_POST['action'];
    if(function_exists($action))
    {
        $action($conn);
    }
    else{
        echo json_encode(['status' => 'error','message' =>"Invalid action"]);
    }
}else{
    echo json_encode(['status' => 'error','message' =>"Invalid action and Action is required"]);
}
// Action End Here

// Total Students Stat Here
function SNumber($conn)
{
        $select=mysqli_query($conn, "SELECT * FROM students");
        if($select && mysqli_num_rows($select)>0)
        {
            // $row=mysqli_num_rows($select);
            echo json_encode(['status' => 'success','message' => mysqli_num_rows($select)]);
        }
        else{
            echo json_encode(['status' => 'error','message' => "No Student found"]);
        }
 }
// Total Students end Here


// Total Students Male Start Here

function maleNumber($conn){
    $selecMale=mysqli_query($conn,"SELECT * FROM students WHERE sex='Male'");
    if($selecMale && mysqli_num_rows($selecMale)>0)
    {
        $rowMale=mysqli_num_rows($selecMale);
        echo json_encode(['status' => 'success','messageMale' => mysqli_num_rows($selecMale)]);
    }
    else{
        echo json_encode(['status' => 'error','messageMale' => 'No Male Student found','Number'=>0]);
    }
}
// Total Students male end Here


// Total Students Female Start Here

function femaleNumber($conn){
    $selecFemale=mysqli_query($conn,"SELECT * FROM students WHERE sex='Female'");
    if($selecFemale && mysqli_num_rows($selecFemale)>0)
    {
        $rowFemale=mysqli_num_rows($selecFemale);
        echo json_encode(['status' => 'success','messageFemale' => mysqli_num_rows($selecFemale)]);
    }
    else{
        echo json_encode(['status' => 'error','messageFemale' => 'No Female Student found','Number'=>0]);
    }
}
// Total Students Female end Here
// Total Professors  Start Here
function professors($conn){
    $selectProfessor=mysqli_query($conn, "SELECT * FROM professors");
    if($selectProfessor && mysqli_num_rows($selectProfessor)>0){
        echo json_encode(['status'=> 'success', 'Professors'=> mysqli_num_rows($selectProfessor)]);
    }
    else{
        echo json_encode(['status'=> 'error', 'Professors'=> 'No Professors found','number'=>0]);
    }
}
// Total Professors  end Here







?>