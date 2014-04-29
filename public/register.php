<?php
    //configuration 
    require("../includes/config.php");
    
    //if form was submitted
    //verify username and password field are not empty
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
    //verify password
        
        if($_POST["password"] != $_POST["confirmation"]){
            apologize("Password is invalid.");     
        }
        // check if user already exist, else add user to databse
        $user_exist=query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        $user=$_POST["username"]; //temp 
        
        if (count($user_exist) ==0){
            
            query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id =$rows[0];
            
            //redirect to index.php page
            $_SESSION["id"] = $id["id"];
            redirect("/");
                
        }else{
            apologize("Username already exists");
        }
        
    }
    else{
        //render form
        render("register_form.php",["title"=>"Register"]);
    }
