<?php   
header('Content-Type: application/json');
// calling Connection File
include("../config/conn.php");

// Making Action Start Here
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
}
else{
    echo json_encode(['status' => 'error','message' =>"Invalid action and Action is required"]);
}
// End Action  Here

// Insert Function Start Here
function insert($conn)
{
    if (isset($_POST['insert']) && $_POST['insert'] == 'Caaqil123') {
        extract($_POST);

        // Validation
        if (empty($f_name) || empty($l_name) || empty($email) || empty($class) || empty($Ssex) || empty($number) || empty($P_name) || empty($P_number) || empty($datepicker) || empty($B_group)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        } else {
            $read_old = mysqli_query($conn, "SELECT * FROM students WHERE student_email='$email'");
            if ($read_old && mysqli_num_rows($read_old) > 0) {
                echo json_encode(['status' => 'error', 'message' => 'This email is already taken']);
            } else {
                if (isset($_FILES['Simage'])) {
                    $image_name = $_FILES['Simage']['name'];
                    $temp_image_name = $_FILES['Simage']['tmp_name'];
                    $folder = "../uploads/" . $image_name;

                    if (move_uploaded_file($temp_image_name, $folder)) {
                        $insert = mysqli_query($conn, "INSERT INTO students (first_name, last_name, student_email, class, sex, mobile_number, parents_name, parents_number, date_of_birth, blood_group, student_image) VALUES ('$f_name', '$l_name', '$email', '$class', '$Ssex', '$number', '$P_name', '$P_number', '$datepicker', '$B_group', '$folder')");
                        
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
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Insert Password']);
    }
}

// Insert Function End Here
// read Function Start Here
function read($conn)
{
    if(isset($_POST['read']) && $_POST['read'] == 'Caaqil123')
    {
        $read=mysqli_query($conn, "SELECT * FROM students");
        if($read && mysqli_num_rows($read) > 0)
        {
          foreach($read as $row)
          {
             ?>
               <tr>
                  <td><?php echo $row['student_id']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['student_email']; ?></td>
                  <td><button data-bs-toggle="modal" data-bs-target="#exampleModal" id="BtnView" student_id="<?php echo $row['student_id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></button></td>
                  <td><button data-bs-toggle="modal" data-bs-target="#updateModal" id="updateBtn" student_id="<?php echo $row['student_id'];?>" class="btn btn-dark"><i class="fas fa-edit"></i></button></td>
                  <td><button id="DeleteBtn" student_id="<?php echo $row['student_id'];  ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
              </tr>
             <?php
          }
        }
        else{
            echo json_encode(['status' => 'error', 'message' =>'No Data Found for students']);
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'Invalid Read & Read Passsword is Required']);
    }
}
// Insert Function End Here
// Delete Function Start Here
function delete($conn)
{
    if(isset($_POST['student_id']))
    {
        $student_id=$_POST['student_id'];
        $delete=mysqli_query($conn, "DELETE FROM students WHERE student_id='$student_id'");
        if($delete)
        {
            echo json_encode(['status' =>'success','message' =>'Successfully deleted']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' =>'Failed to delete']);
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'Student ID is Required']);
    }
}
// Delete Function End Here
// View Function Start Here
function view($conn)
{
    if(isset($_POST['student_id']))
    {
        $student_id=$_POST['student_id'];
        $readView=mysqli_query($conn, "SELECT * FROM students WHERE student_id='$student_id'");
        if($readView && mysqli_num_rows($readView)>0)
        {
           foreach($readView as $rowView)
           {
            ?>
            <div class="col-lg-12">
								<div class="card">
									<div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
										<div class="profile-photo">
                                        <?php
                                            $image = file_get_contents($rowView['student_image']) .'style=width: 100%; height: 100%;';
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '"width="80px" height="40px"  class="img-fluid rounded-circle" alt="">';
                                            ?>
										</div>
										<h3 class="mt-3 mb-1 text-white"><?php echo $rowView['first_name']  ?></h3>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student ID</span> <strong class="text-muted"><?php echo $rowView['student_id'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">First Name</span> <strong class="text-muted"><?php echo $rowView['first_name'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Last Name</span> <strong class="text-muted"><?php echo $rowView['last_name'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Student Email</span> <strong class="text-muted"><?php echo $rowView['student_email'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Class</span> <strong class="text-muted"><?php echo $rowView['class'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Sex</span> <strong class="text-muted"><?php echo $rowView['sex'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mobile Number</span> <strong class="text-muted"><?php echo $rowView['mobile_number'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Parent Name</span> <strong class="text-muted"><?php echo $rowView['parents_name'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Parent Number</span> <strong class="text-muted"><?php echo $rowView['parents_number'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Date Of Birth</span> <strong class="text-muted"><?php echo $rowView['date_of_birth'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Blood Group</span> <strong class="text-muted"><?php echo $rowView['Blood_group'];  ?></strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Registration Date</span> <strong class="text-muted"><?php echo $rowView['Registration_Date'];  ?></strong></li>
									</ul>
									<!-- <div class="card-footer text-center border-0 mt-0">								
										<a href="javascript:void(0);" class="btn btn-primary btn-rounded px-4">Follow</a>
										<a href="javascript:void(0);" class="btn btn-warning btn-rounded px-4">Message</a>
									</div> -->
								</div>
							</div>
            <?php
           }
        }
        else{
            echo json_encode(['status' => 'error', 'message' =>'Failed to View']);
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'Student id is Required']);
    }
}
// View Function End Here
// Read Update Function Start Here
function readupdate($conn)
{
    if(isset($_POST['student_id']))
    {
        $student_id=$_POST['student_id'];
        $readUpdate =mysqli_query($conn, "SELECT * FROM students WHERE student_id='$student_id'");
        if($readUpdate && mysqli_num_rows($readUpdate)>0)
        {
           foreach($readUpdate as $rowUpdate)
           {
            ?>
             <form id="UpdateForm" method="post" enctype="multipart/form-data">
             <input type="text" hidden name="student_id" id="student_id" class="form-control" value="<?php echo $rowUpdate['student_id'];  ?>">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="f_name" id="f_name" class="form-control" value="<?php echo $rowUpdate['first_name'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="l_name" id="l_name" class="form-control" value="<?php echo $rowUpdate['last_name'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $rowUpdate['student_email'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Class</label>
                                            <select class="form-control" name="class" id="class">
                                                <option value="<?php echo $rowUpdate['class'];  ?>" selected><?php echo $rowUpdate['class'];  ?></option>
                                                <option value="HTML">HTML</option>
                                                <option value="CSS">CSS</option>
                                                <option value="JavaScript">JavaScript</option>
                                                <option value="Angular">Angular</option>
                                                <option value="React">React</option>
                                                <option value="Vue.js">Vue.js</option>
                                                <option value="Ruby">Ruby</option>
                                                <option value="PHP">PHP</option>
                                                <option value="ASP.NET">ASP.NET</option>
                                                <option value="Python">Python</option>
                                                <option value="MySQL">MySQL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Sex</label>
                                            <select class="form-control" name="Ssex" id="Ssex">
                                                <option value="<?php echo $rowUpdate['sex']; ?>" selected><?php echo $rowUpdate['sex'];   ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" name="number" id="number" class="form-control" value="<?php echo $rowUpdate['mobile_number'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Parents Name</label>
                                            <input type="text" name="P_name" id="P_name" class="form-control" value="<?php echo $rowUpdate['parents_name'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Parents Mobile Number</label>
                                            <input type="number" name="P_number" id="P_number" class="form-control" value="<?php echo $rowUpdate['parents_number'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="text" name="datepicker" id="datepicker" class="datepicker-default form-control" value="<?php echo $rowUpdate['date_of_birth'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" name="B_group" id="B_group" class="form-control" value="<?php echo $rowUpdate['Blood_group'];  ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" name="insert" value="Caaqil123" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </form>
            <?php
           }
        }
        else{
            echo json_encode(['status' => 'error', 'message' =>'Failed to Read Update']);
        }
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>'Student id is Required']);
    }
}
// Read Update Function End Here
//  Update Function Start Here
function update($conn)
{
    if(isset($_POST['student_id']))
    {
        $student_id = $_POST['student_id'];
         
        extract($_POST);
        // Form validation
         // Validation
    if (empty($f_name) || empty($l_name) || empty($email) || empty($class) || empty($Ssex) || empty($number) || empty($P_name) || empty($P_number) || empty($datepicker) || empty($B_group)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
    } 
    else{
        $update = mysqli_query($conn, "UPDATE students SET first_name='$f_name', last_name='$l_name', student_email='$email', class='$class', sex='$Ssex', mobile_number='$number', parents_name='$P_name', parents_number='$P_number', date_of_birth='$datepicker', Blood_group='$B_group' WHERE student_id='$student_id'");
        if($update)
        {
           echo json_encode(['status' => 'success','message' =>'Successfully updated']);
        }
        else{
            echo json_encode(['status' => 'error','message'=>'Something went wrong When updating student']);
        }
    }
        
    }
    else{
        echo json_encode(['status' => 'error','message'=>'Student Id is Required']);
 
    }
}
//  Update Function End Here
?>
