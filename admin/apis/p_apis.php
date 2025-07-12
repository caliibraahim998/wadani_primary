<?php  
header('Content-Type: application/json');
// Calling Connection File
 include("../config/conn.php");
//  Making Action Start Here
 if(isset($_POST['action'])){
    $action = $_POST['action'];
    if(function_exists($action))
    {
        $action($conn);
    }
    else{
        echo json_encode(['status' => 'error','message' =>"Invalid action"]);
    }
 }
 else{
    echo json_encode(['status' => 'error','message' =>"Invalid action and Action is required"]);
 }
//  Making Action end Here
//  Insert teachers start   Here
function insert($conn) {
    if (isset($_POST['insert']) && $_POST['insert'] == 'Caaqil123') {
        extract($_POST);

        // Xaqiijinta foomka
        if (empty($tf_name) || empty($tl_name) || empty($t_email) || empty($password) || empty($cpassword) || 
            empty($m_number) || $Tsex === 'sex' || $department === 'Department' || empty($designation) || empty($date)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            return;
        }

        // Hubi haddii email horey u jiro
        $read_old = mysqli_query($conn, "SELECT * FROM professors WHERE email='$t_email'");
        if ($read_old && mysqli_num_rows($read_old) > 0) {
            echo json_encode(['status' => 'error', 'message' => 'This email is already taken']);
            return;
        }

        // Hubi iswaafajinta erayga sirta
        if ($password !== $cpassword) {
            echo json_encode(['status' => 'error', 'message' => 'Password and confirm password do not match']);
            return;
        }

        // Hubinta iyo dhaqangelinta sawirka
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            // Hubi haddii faylku yahay sawir sax ah
            // $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            // $fileType = mime_content_type($_FILES['image']['tmp_name']);

            // if (!in_array($fileType, $allowedTypes)) {
            //     echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Only JPG, JPEG, and PNG are allowed.']);
            //     return;
            // }

            $image_name = basename($_FILES['image']['name']);
            $temp_image_name = $_FILES['image']['tmp_name'];
            $image_path = "../uploads/teacher/" . $image_name;

            if (move_uploaded_file($temp_image_name, $image_path)) {
                // Kaydinta xogta foomka
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $insert = mysqli_query($conn, "INSERT INTO professors(first_name,last_name,email,`password`,mobile_number,sex,designation,department,date_of_birth,t_image) 
                                               VALUES ('$tf_name', '$tl_name', '$t_email', '$hashPassword', '$m_number', '$Tsex', '$designation', '$department', '$date', '$image_name')");
                if ($insert) {
                    echo json_encode(['status' => 'success', 'message' => 'Successfully inserted']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong while inserting']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File upload failed or no file selected']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Insert Password']);
    }
}




//  Insert teachers   end Here
//  Read teachers   end Here

function read($conn)
{
    if(isset($_POST['read']) && $_POST['read']== 'Caaqil123'){
        $read=mysqli_query($conn, "SELECT * FROM professors");
        if($read && mysqli_num_rows($read)>0){
           foreach($read as $row){
            ?>
               <tr>
			 <th><?php echo $row['id']; ?></th>
			 <th><?php echo $row['first_name']; ?></th>
			 <th><?php echo $row['last_name']; ?></th>
			 <th><?php echo $row['email']; ?></th>
			 <th><button class="btn btn-primary"><i class="fas fa-eye"></i></button></th>
			 <th><button id="RUBTN" pId="<?php  echo $row['id'] ?>"  class="btn btn-success"><i class="fas fa-edit"></i></button></th>
			 <th><button id="PDeleteBTN" pId="<?php  echo $row['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></th>
			 </tr>
            <?php
           }
        }
        else{
            echo json_encode(['status'=>'error','message'=>'No data found']);
        }
    }
    else{
        echo json_encode(['status'=>'error','message'=>'Invalid Read Password']);
    }
}
//  Read teachers   end Here
//  Delete teachers   Start Here
function DeleteF($conn){
    if(isset($_POST['pId'])){
        $pId=$_POST['pId'];
        $delete=mysqli_query($conn, "DELETE FROM  professors  WHERE id ='$pId'");
        if($delete){
              echo json_encode(['status'=>'success','message'=>'SuccessFully Deleted!']);
        }else{
                        echo json_encode(['status'=>'error','message'=>'No Professor Deleted']);

        }
    }
}
//  Delete teachers   end Here
//  Read Update  teachers   Start Here
function Read_update($conn){
    if(isset($_POST['pId'])){
         $pId=$_POST['pId'];
         $ReadUpdate=mysqli_query($conn,"SELECT * FROM  professors WHERE id=''$pId");
         if($ReadUpdate && mysqli_num_rows($ReadUpdate)>0){
            foreach($ReadUpdate as $row){
                ?>
                
                <?php
            }
         }
    }

}
//  Read Update  teachers   end Here

?>