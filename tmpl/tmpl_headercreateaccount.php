<!-- begin tmpl_headercreateaccount -->

<html>
    <head><title><?php echo title; ?> | <?php echo version; ?> | <?php echo slogan; ?>   </title>
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
 
<style type="text/css">
label {
    float: left;
    padding-right:10px;
    color: white;
}
label.error {
    float: none;
    font-family: "Arial";
    size: 10px;
    color: red;
    padding-left: .5em;
    vertical-align: top;
}
p {
    clear: both;
}
.gray {
    /*color: gray;*/
    display: none;
}

</style>
 <script type="text/javascript">
 function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#passwordConfirm").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<font color=red>Wachtwoord komt nog niet overeen</font>");
    else
        $("#divCheckPasswordMatch").html("<font color=green>Password komt overeen!</font>");
}

$(document).ready(function () {
   $("#passwordConfirm").keyup(checkPasswordMatch);
});
 </script>
 
<script type="text/javascript">
$(document).ready(function(){
    // validate signup form on keyup and submit
    $("#createForm").validate({
        rules: {
            username: "required",
            password: "required",
            email: {
                required: false,
                email: false
            },

            agree: "required",
            
        },
        messages: {
            username: "Vul alstublieft een gebruikersnaam in (13 characters).",
            password: "Vul alstublieft een wachtwoord in.",
            agree: "U moet akkoord gaan met de voorwaarden."
        }
    });
     
});
</script>

    
    

    <link rel="stylesheet" type="text/css" href="tmpl/stylingIndex.css" /> 
</head>
    <body>
    <div id="main">
    <div class="topbar"><h1><?php echo title; ?></h1></div>
        
    <!-- Register / Login-->
        <div class="playBar">
        <div class="clickPlay"><a href="play.php">Play Free</a></div>
        <br>
        <div class="registerAccount">If you don't have an account <a href="createaccount.php">click here</a> to create a free game account!</div>
        </div>
    <!-- Register / Login end -->
    
