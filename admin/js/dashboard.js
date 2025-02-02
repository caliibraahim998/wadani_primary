$(document).ready(function () {
    

    sNum();
    function sNum()
    {
        $.ajax({
            type: "POST",
            url: "Dashboard_api.php",
            data: {"action": "SNumber"},
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                $("#Snum").html(response.message);
                
            }
        });
    }

    // Male Student Logic Start Here
    MaleStudent();

    function MaleStudent(){
        $.ajax({
            type: "POST",
            url: "Dashboard_api.php",
            data: {"action":"maleNumber"},
            dataType: "json",
            success: function (response) {
                // console.log(response.messageMale);
                $("#SMale").html(response.messageMale);
                
            }
        });
    }

    // Female Student Logic Start Here
    FemaleStudent();

    function FemaleStudent(){
        $.ajax({
            type: "POST",
            url: "Dashboard_api.php",
            data: {"action":"femaleNumber"},
            dataType: "json",
            success: function (response) {
                // console.log(response.messageFemale);
                $("#SFemale").html(response.messageFemale);
                
            }
        });
    }

    // Total Student Logic Start Here
    tOtalprofessoras();

    function tOtalprofessoras(){
        $.ajax({
            type: "POST",
            url: "Dashboard_api.php",
            data: {"action":"professors"},
            dataType: "json",
            success: function (response) {
                // console.log(response.message);
                $("#professorsRead").html(response.Professors);
                
            }
        });
    }

    //  list Of listOfProfessors
    listProfessors();
    function listProfessors(){
       $.ajax({
        type: "POST",
        url: "Dashboard_api.php",
        data:{"action":"listOfProfessors"},
        dataType: "html",
        success: function (response) {
            $("#ListOfProfessors").html(response);
        }
       });
    }

// user profile Start Here
startUserProfile();
function startUserProfile(){
    $.ajax({
        type: "POST",
        url: "Dashboard_api.php",
        data:{"action":"userProfile"},
        dataType: "html",
        success: function (response) {

            $("#userProfileBody").html(response);
            
        }
    });
}
// user profile end Here

    // Profile_read Function
    Profile_read();

    function Profile_read(){
        $.ajax({
            type: "POST",
            url: "Dashboard_api.php",
            data: {"action": "profileRead",},
            dataType: "json",
            success: function (response) {
                $(".userName").html(response.use_name);
                $(".image_parent").html(`<img src='${response.userImage}' alt='user-image' class='img-fluid rounded-circle'>`);
                $(".userEmail").html(response.use_email);
                $(".userRole").html(response.useRole);
                
            }
        });
    }
});

