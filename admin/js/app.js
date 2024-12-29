$(document).ready(function () {

   // Read Logic Start Here
   readRequest();

   function readRequest()
   {
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data:{"action": "read", "read":"Caaqil123"},
        dataType: "html",
        success: function (response) {
            // console.log(response);
            $("#ReadBody").html(response);
            
        }
    });
   }



    $(document).on('submit','#InsertForm', function(e){
        e.preventDefault();
        // console.log("clicked");
        let formdata= new FormData(this);
        formdata.append("action","insert");
        formdata.append("insert","Caaqil123");
        // console.log(formdata);
        $.ajax({
            type: "POST",
            url: "apis/s_api.php",
            contentType:false,
            processData:false,
            data: formdata,
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                if(response.status == "success") {
                    Swal.fire({
                        text:"Good Job!",
                        title:response.message,
                        icon:"success"
                    })
                    $("#InsertForm")[0].reset();
                }
                else if(response.status == "error")
                {
                    Swal.fire({
                        text:"I Am Sorry!",
                        title:response.message,
                        icon:"error"
                    })
                }
                
            }
        });
    })
//  Delete Logic Start Here
$(document).on('click','#DeleteBtn', function(e){
    e.preventDefault();
    // console.log("Deleted");
    let StudentId = $(this).attr("student_id")
    // console.log(StudentId);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
         $.ajax({
            type: "POST",
            url: "apis/s_api.php",
            data: {"action": "delete","student_id":StudentId},
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                if(response.status == "success") {
                   Swal.fire({
                    text:"Good Job!",
                    title:response.message,
                    icon:"success"
                   })
                    readRequest();
                }
                else if(response.status == "error")
                {
                    Swal.fire({
                        text:"I Am Sorry!",
                        title:response.message,
                        icon:"error"
                    })
                }
                
            }
         });
        }
      });

})
// View Logic Start Here
$(document).on('click','#BtnView',function(e){
    e.preventDefault();
    // console.log("clicked");
    let StudentId=$(this).attr('student_id');
    // console.log(StudentId);

    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data: {"action":"view", "student_id":StudentId},
        dataType: "html",
        success: function (response) {
            // console.log(response);

            $("#viewModalBody").html(response);

            
        }
    });
})
// read Update Logic Start Here
$(document).on('click','#updateBtn',function (e) {
    e.preventDefault();
    // console.log("clicked");
    let StudentId=$(this).attr('student_id');
    // console.log(StudentId);
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data: {"action": "readupdate", "student_id": StudentId},
        dataType: "html",
        success: function (response) {
            // console.log(response);
            $("#updateModalBody").html(response);
            
        }
    });
})
// Update Logic Start Here

$(document).on("submit","#UpdateForm",function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata= new FormData(this);
    formdata.append("action","update");
    // console.log(formdata);
    $.ajax({
        type: "POST",
        url: "apis/s_api.php",
        data:formdata,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            // console.log(response.message);
            if(response.status == "success")
            {
                          Swal.fire({
                            title:"Good Lucky !",
                            text:response.message,
                            icon:"success"
                          })
                          readRequest();
                          $("#UpdateForm")[0].reset();
            } else if(response.status == "error")
            {
              Swal.fire({
                title:"I Am Soory",
                text:response.message,
                icon:"error"
              })
            }
            
        }
    });
})



// Teachers Read Logic
read();
function read()
{
    $.ajax({
        type: "POST",
        url: "apis/p_apis.php",
        data:{"action": "read", "read":"Caaqil123"},
        dataType: "html",
        success: function (response) {
            // console.log(response);
            $("#ReadModalBody").html(response);
            
        }
    });
}


//  insert Teachers Logic 
$(document).on('submit','#teacherForm',function(e){
    e.preventDefault();
    // console.log("clicked");
    let formdata= new FormData(this);
    formdata.append("action","insert");
    formdata.append("insert","Caaqil123");
    // console.log(formdata);
    $.ajax({
        type: "POST",
        url: "apis/p_apis.php",
        contentType:false,
         processData: false,
          data:formdata, 
        dataType: "json",
        success: function (response) {
            // console.log(response.message);
            if(response.status == "success"){
                Swal.fire({
                    text:"Good Job!",
                    title:response.message,
                    icon:"success"
                })
                $("#teacherForm")[0].reset();
            }else if(response.status == "error"){
                Swal.fire({
                    text:"I`m Sorry!",
                    title:response.message,
                    icon:"error"
                })
            }
            
        }
    });
})
});