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

});