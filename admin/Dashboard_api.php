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
// LIst of  Professors  Start Here
function listOfProfessors($conn){
$read = mysqli_query($conn, "SELECT * FROM professors");
if($read && mysqli_num_rows($read) > 0){
    foreach($read as $row){
        ?>
          <div class="media mb-3 align-items-center border-bottom pb-3">
          <img class="mr-3 rounded-circle" alt="image" width="50" src="<?php echo 'uploads/teacher/' . htmlspecialchars($row['t_image']); ?>">
          <div class="media-body">
           <h5 class="mb-0 text-pale-sky"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> <small class="text-muted">(<?php echo $row['department'] ; ?> )</small></h5>
           <small class="text-primary mb-0"><?php echo $row['designation']; ?> </small>
		   </div>
		 </div>
        <?php
    }
}
else{
    echo json_encode(['status' => 'error', 'message' =>'not found in Professors']);
}
}
// List of  Professors  end Here


// User Profile Start Here
function userProfile($conn){
    $userRead=mysqli_query($conn, "SELECT * FROM manager WHERE user_token='verified'");
    if($userRead && mysqli_num_rows($userRead)>0){
      $row=mysqli_fetch_assoc($userRead);
      ?>
      
       <img  src="<?php echo $row['user_image']; ?>" width="20" alt="">
       <h6 style="margin-left:10px; margin-top:5px; color:#fff;"><?php echo $row['username']; ?></h6>
     
      <?php
       
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'not found in User Profile']);
    }
}
// User Profile End Here

// Read Proifle Login start here
function profileRead($conn){
    $profileRead=mysqli_query($conn, "SELECT * FROM manager");
    if($profileRead && mysqli_num_rows($profileRead)>0){
      $rowProfileread=mysqli_fetch_assoc($profileRead);
     
    echo json_encode(['status' =>'success',
    'use_name' => $rowProfileread['username'],
    'use_email' => $rowProfileread['email'],
    'useRole' => $rowProfileread['user_role'],
    'use_token' => $rowProfileread['user_token'],
    'userImage' => $rowProfileread['user_image'],
    'Registration Date' => $rowProfileread['create_date'],

   


   
]);
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'not found in User Profile']);
    }
}
// Read Proifle Login End here









?>