$(document).ready(function () {
    $(document).on("submit","#Regform",function (e) {
        e.preventDefault();
        // console.log("clicked");
        let formdata =new FormData(this);
        formdata.append("action","register");
        formdata.append("register","Caaqil123");
        // console.log(formdata);

        $("#BtnSave").html('<img width="30px" src="../admin/images/loading.gif"/>');
        setTimeout(function () {

            $.ajax({
                type: "POST",
                url: "apis/auth_api.php",
                data:formdata,
                contentType:false,
                processData:false,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if(response.status == "success") {
                        Swal.fire({
                            title: "Good job!",
                            text: response.message,
                            icon: "success"
                          });
                          $("#BtnSave").html('<i class="btn btn-primary btn-block"></i> sign uP me ');                 
                     }
                         else if(response.status == "error") 
                       {
                        Swal.fire({
                            title: "I Am sorry!",
                            text: response.message,
                            icon: "error"
                          });
                       }
                    
                }
            });

        },500)
       
    })

//    the Logic Of Login Start Here
$(document).on("submit","#LoginForm",function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata =new FormData(this);
    formdata.append("action","login");
    formdata.append("login","Caaqil123");
    // console.log(formdata);

$.ajax({
    type: "POST",
    url: "apis/auth_api.php",
    data: formdata,
    contentType:false,
    processData:false,
    dataType: "json",
    success: function (response) {
        // console.log(response.message);
        if(response.status == "success")
        {
            window.location.href="../admin/index.php";
        }
        else{
            Swal.fire({
                title: "I Am sorry!",
                text: response.message,
                icon: "error"
            });
        }
        
    }
});
})

//    the Logic Of Forgot Password Start Here
$(document).on('submit','#ForgetForm',function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata =new FormData(this);
    formdata.append("action","forgetPassword");
    formdata.append("forgetPassword","Caaqil123");
    // console.log(formdata);
    $("#BtnSave").html('<img width="30px" src="../admin/images/loading.gif"/>');
    setTimeout(function () {
        $.ajax({
            type: "POST",
            url: "apis/auth_api.php",
            data:formdata,
            contentType:false,
            processData: false,
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                if(response.status == "success")
                {
                    Swal.fire({
                        title: "Good job!",
                        text: response.message,
                        icon: "success"
                    });
                    $("#BtnSave").html('<i class="btn btn-primary btn-block"></i>SUBMIT');
                }
                else if(response.status == "error"){
                    Swal.fire({
                        title: "I Am sorry!",
                        text: response.message,
                        icon: "error"
                    });
                    $("#BtnSave").html('<i  class="btn btn-primary btn-block"></i>SUBMIT');
                }
                
            }
        });
    }, 500);
   
})
//    the Logic Of Forgot Password End Here

// Password Rcovery start here
$(document).on('submit','#RecoveryForm',function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata =new FormData(this);
    formdata.append("action","recoveryPassword");
    formdata.append("recoveryPassword","Caaqil123");
    // console.log(formdata);
    $.ajax({
        type: "POST",
        url: "apis/auth_api.php",
        data:formdata,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            // console.log(response.message);
            if(response.status == "success"){
                Swal.fire({
                    title: "Good job!",
                    text: response.message,
                    icon: "success"
                });
                $("#RecoveryForm")[0].reset();
                setTimeout(function () {
                    window.location.href = "login.php";
                }, 2000);
            } else if(response.status == "error"){
                Swal.fire({
                    title: "I Am sorry!",
                    text: response.message,
                    icon: "error"
                });
            }
            
        }
    });

})
// Password Rcovery End here
});
