<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
   <?php  include("css_links.php");  ?>
	

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include("header.php"); 
        
        
        
        // -**********************************
        // Sidebar start
    // ***********************************-->
       include("sidebar.php");
    // <!--**********************************
        // Sidebar end
    // ***********************************-->
        
        
        ?>
       

       

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>About Student</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="all_students.php">Students</a></li>
                            <li class="breadcrumb-item active"><a href="about-student.php">About Student</a></li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-xl-3 col-xxl-4 col-lg-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
										<div class="profile-photo">
											<img src="images/profile/profile.png" width="100" class="img-fluid rounded-circle" alt="">
										</div>
										<h3 class="mt-3 mb-1 text-white">Deangelo Sena</h3>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Followers</span> <strong class="text-muted">1204	</strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Following</span> <strong class="text-muted">2540	</strong></li>
										<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Friends</span> <strong class="text-muted">2540</strong></li>
									</ul>
									<div class="card-footer text-center border-0 mt-0">								
										<a href="javascript:void(0);" class="btn btn-primary btn-rounded px-4">Follow</a>
										<a href="javascript:void(0);" class="btn btn-warning btn-rounded px-4">Message</a>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h2 class="card-title">about me</h2>
									</div>
									<div class="card-body pb-0">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Gender</strong>
												<span class="mb-0">Male</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Education</strong>
												<span class="mb-0">PHD</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Email</strong>
												<span class="mb-0">info@example.com</span>
											</li>
											<li class="list-group-item d-flex px-0 justify-content-between">
												<strong>Phone</strong>
												<span class="mb-0">+01 123 456 7890</span>
											</li>
										</ul>
									</div>
									<div class="card-footer pt-0 pb-0 text-center">
										<div class="row">
											<div class="col-4 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">150</h3>
												<span>Projects</span>
											</div>
											<div class="col-4 pt-3 pb-3 border-right">
												<h3 class="mb-1 text-primary">140</h3>
												<span>Uploads</span>
											</div>
											<div class="col-4 pt-3 pb-3">
												<h3 class="mb-1 text-primary">45</h3>
												<span>Tasks</span>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-lg-12">
								<div class="card">
									<div class="card-header d-block">
										<h4 class="card-title">Address </h4>
									</div>
									<div class="card-body">
										<p class="mb-0">Demo Address #8901 Marmora Road Chi Minh City, Vietnam</p>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-lg-12">
								<div class="card">
									<div class="card-header d-block">
										<h4 class="card-title">Interest </h4>
									</div>
									<div class="card-body">
										<h6>Photoshop
											<span class="pull-right">85%</span>
										</h6>
										<div class="progress ">
											<div class="progress-bar bg-danger progress-animated" style="width: 85%; height:6px;" role="progressbar">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
										<h6 class="mt-4">Code editor
											<span class="pull-right">90%</span>
										</h6>
										<div class="progress">
											<div class="progress-bar bg-info progress-animated" style="width: 90%; height:6px;" role="progressbar">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
										<h6 class="mt-4">Illustrator
											<span class="pull-right">65%</span>
										</h6>
										<div class="progress">
											<div class="progress-bar bg-success progress-animated" style="width: 65%; height:6px;" role="progressbar">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 col-lg-8">
						<div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a></li>
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link">Posts</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="about-me" class="tab-pane fade active show">
                                                <div class="profile-personal-info pt-4">
                                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>Mitchell C.Shay</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>info@example.com</span>
                                                        </div>
                                                    </div>
													<div class="row mb-4">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                            <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>18</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                            <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>Rosemont Avenue Melbourne,
                                                                Florida</span>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="profile-skills pt-2 border-bottom-1 pb-2">
                                                    <h4 class="text-primary mb-4">Skills</h4>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Admin</a>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Dashboard</a>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Photoshop</a>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Bootstrap</a>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Responsive</a>
                                                    <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">Crypto</a>
                                                </div>
                                                <div class="profile-lang pt-5 border-bottom-1 pb-5">
                                                    <h4 class="text-primary mb-4">Language</h4><a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                    <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                </div>
												<div class="profile-about-me">
                                                    <div class="border-bottom-1 pb-4">
                                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                                        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                                    </div>
                                                </div>
                                            </div>
											<div id="my-posts" class="tab-pane fade">
                                                <div class="my-post-content pt-3">
                                                    <div class="post-input">
                                                        <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea> <a href="javascript:void()"><i class="ti-clip"></i> </a>
                                                        <a href="javascript:void()"><i class="ti-camera"></i> </a><a href="javascript:void()" class="btn btn-primary">Post</a>
                                                    </div>
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                        <a class="post-title" href="javascript:void()">
                                                            <h4>Collection of textile samples lay spread</h4>
                                                        </a>
                                                        <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                            of spare which enjoy whole heart.</p>
                                                        <button class="btn btn-primary mr-3"><span class="mr-3"><i class="fa fa-heart"></i></span>Like</button>
                                                        <button class="btn btn-secondary"><span class="mr-3"><i class="fa fa-reply"></i></span>Reply</button>
                                                    </div>
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="images/profile/9.jpg" alt="" class="img-fluid">
                                                        <a class="post-title" href="javascript:void()">
                                                            <h4>Collection of textile samples lay spread</h4>
                                                        </a>
                                                        <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                            of spare which enjoy whole heart.</p>
                                                        <button class="btn btn-primary mr-3"><span class="mr-3"><i class="fa fa-heart"></i></span>Like</button>
                                                        <button class="btn btn-secondary"><span class="mr-3"><i class="fa fa-reply"></i></span>Reply</button>
                                                    </div>
                                                    <div class="profile-uoloaded-post pb-5">
                                                        <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                        <a class="post-title" href="javascript:void()">
                                                            <h4>Collection of textile samples lay spread</h4>
                                                        </a>
                                                        <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
                                                            of spare which enjoy whole heart.</p>
                                                        <button class="btn btn-primary mr-3"><span class="mr-3"><i class="fa fa-heart"></i></span>Like</button>
                                                        <button class="btn btn-secondary"><span class="mr-3"><i class="fa fa-reply"></i></span>Reply</button>
                                                    </div>
                                                    <div class="text-center mb-2"><a href="javascript:void()" class="btn btn-primary">Load More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div> -->
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

   <?php include("js_.links.php"); ?>
	
</body>
</html>