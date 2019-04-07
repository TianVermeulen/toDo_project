<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>toDo app</title>
</head>
<body>
<h3>Welcome to my To-Do list</h3>

<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
<input type = "text" name = "toDoEntry">
<input type = "submit">
</form>

<?php


    if(isset($_POST["toDoEntry"])){
        if(!(isset($_SESSION["items"]))){
        $_SESSION["items"] = array();
        $_SESSION["items"][] = $_POST["toDoEntry"];
        
        echoL();       
    }else{
        $_SESSION["items"][] = $_POST["toDoEntry"];
        echoL();

    }
};

function echoL(){
    echo "<ul>";
        foreach($_SESSION["items"] as $item){
            echo "<li>".$item."</li>";
        };
        echo "</ul>"; 

};


?>

<script>

$(document).ready(function(){
    var done = 0;
    $("li").each(function(c){
        $(this).click(function(){
        checked = c;
         if(done == 0){
            $(this).css("text-decoration", "line-through");
            done = 1;
            sessionStorage.setItem(checked, done);

           }else{
               $(this).css("text-decoration", "none");
               done = 0;
               sessionStorage.setItem(checked, done);
            }
        });
    });
$("li").each(function(c){
    if(sessionStorage.getItem(c)==1){
        $(this).css("text-decoration", "line-through");
    }
});
});



</script>
    
</body>
</html>