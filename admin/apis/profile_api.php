<?php
header('content-type: application/json');
include("../config/conn.php");
if(isset($_POST['action'])){
    $action=$_POST['action'];
    if(function_exists($action)){
        $action($conn);
    }else{
        echo json_encode(['status'=>'error','message'=>'Invalid action']);
    }
}else{
    echo json_encode(['status'=>'error','message'=>'Invalid action and Action is required']);
}
// Profile Read
function update_profileRead($conn){
    if(isset($_POST['student_id'])){
        $student_id=$_POST['student_id'];
        $readProfile=mysqli_query($conn , "SELECT * FROM manager WHERE id='$student_id'");
        if($readProfile && mysqli_num_rows($readProfile)>0){
          $rowPrfile=mysqli_fetch_assoc($readProfile);
          ?>
             <form  id="UpdateProfile" method="post">
        <div class="row">
            <div class="input-group">
                <input type="file" style="border-radius: 100px; width:100px; height:100px; background:black; margin-left:180px;" placeholder="First name" aria-label="First name">
            </div> 
            <div class="col mt-2">
                <input type="text" class="form-control"  aria-label="first_name">
            </div>
            <div class="col mt-2">
                <input type="email" class="form-control"  aria-label="Email">
            </div>
            </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
          <?php
        }
    }else{
        echo json_encode(['status'=>'error','message'=>'Student ID is required']);
    }
}
?>