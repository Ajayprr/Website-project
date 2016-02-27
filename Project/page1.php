<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name    = $email = $gender = $comment = $website = "";
$go      = false;

$semail    = $p = $cp = "";
$semailerr = $perr = $cperr = "";
$bo        = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($_POST['submit'] == 'Sign') {
        $go = true;
        if (empty($_POST["password"])) {
            $nameErr = "Password is required";
            $go      = false;
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $go       = false;
        } else {
            $email = test_input($_POST["email"]);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $go       = false;
            }
        }
        
        
    } else {
        $bo = true;
        
        if (empty($_POST["spassword"])) {
            $perr = "Password is required";
            $bo   = false;
            
        }
        if (empty($_POST["scpassword"])) {
            $cperr = "Password is required";
            
            $bo = false;
        }
        if (!($_POST["scpassword"] === $_POST["spassword"])) {
            $cperr = "Passwords does not match";
            
            $bo = false;
        }
        if (empty($_POST["semail"])) {
            $semailerr = "Email is required";
            $bo        = false;
        } else {
            $email = test_input($_POST["semail"]);
           
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $semailerr = "Invalid email format";
                $bo        = false;
            }
        }
    }
    
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$zoo = false;
$too=false;
?><?php
if ($bo) {
    
    $conn = mysqli_connect("localhost", "root", "", "users");
    if (!$conn) {
        
    } else {
        
        $te     = $_POST["semail"];
        $sql    = "SELECT id, email FROM users WHERE email='$te'";
        $result = mysqli_query($conn, $sql);
        
        
        if ($result != false) {
            
            
            if (mysqli_num_rows($result) > 0) {
                
                $semailerr = "Email already registered";
            }
            
            else {
                
                $te  = $_POST["semail"];
                $tp  = $_POST['spassword'];
                $sql = "INSERT INTO users (email, password) VALUES ('$te','$tp')";
                
               
                if (mysqli_query($conn, $sql)) {
                    $zoo = true;
                    
                } else {
                  
                }
                
                mysqli_close($conn);
                
            }
        }
        
    }
}
if($go)
{
$conn = mysqli_connect("localhost","root","","users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	$e = $_POST["email"];
	$p=	$_POST['password'];
	
	$sql = "SELECT id, email,password FROM users WHERE email='$e'";
	$result = mysqli_query($conn, $sql);
	if($result != false)
	{
		if (mysqli_num_rows($result) > 0) {
	
			while($row = mysqli_fetch_assoc($result)) {
		if( $row["email"] == $e && $row["password"] == $p)
		{
			echo "Sucessfully logged";
			$too = true;
		}
		else{
			$emailErr = "Password is in correct";
		}	

	    }
	} else {
	    $emailErr = "Email id not Registered";
	}
	
	}
	}

} 
?><?php if($zoo){header('Location:Loggedin.php');exit;ob_end_flush();}else if($too){header('Location:MyAcc.php');exit;} ?><!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Shadows Into Light">
	<link rel="icon" type='image/gif' href='icon.png'  	>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<title>Sky Productions</title>
      <style> 

	@font-face {
	font-family: Chunk;
	src: url("Chunkfive.otf") format("opentype");
	}
         html,body
         {
         width:100%;
         height:100%;
         }
         .p{
         position:relative;	
         display:inline;
         }
         *{
         padding: 0;
         margin: 0;
         }
         #image {
         width:100%;
         height:100%;
         background-image:url("ori1.jpg");
         size:cover;
         background-position: right top;
         position:relative;
         background-size: 100% 100%;
         z-index:-1;
         }
         #image2 {
         width:100%;
         height:100%;
         background-image:url("ori2.jpg");
         size:cover;
         background-position: right top;
         position:relative;
         z-index:-1;
	
         }
         #image3 {
         width:100%;
         height:100%;
         background-image:url("ori3.jpg");
         size:cover;
         background-position: right top;
         position:relative;
         background-size: 100% 100%;
         z-index:-1;
		
         }
         /*
         #image4 {
         size:cover;
         width:100%;
         height:100%;
         position:relative;
         z-index:-1;
         */	
         }
         .content {
         z-index:1;
         width:100%;
         height:100%;
         position:relative;
         background-color:#B2BEB5;
         }
         .con{
         position:absolute;
         font-family:Josefin Slab;
         z-index:2;
         color:white;
         left:10%;
         top:40%;
         font-size:60px;
         }
         #content {
         z-index:1;
         width:100%;
         height:100%;
         position:relative;
         background-color:#B2BEB5;
         }
         #content2 {
         z-index:1;
         width:100%;
         height:100%;
         position:relative;
         background-color:#B2BEB5;
         }
         #content3 {
         z-index:1;
         width:100%;
         height:100%;
         position:relative;
         background-color:#B2BEB5 ;
	
         }
         #scrol{
         position:absolute;
         font-family:Shadows Into Light;
         top:90%;
         left:45%;
         color:white;
         font-size:30px;
         }
         #menu {
         position:fixed;
         background-color:#fbfbfb;
         width:105%;
         height:8.5%;
	 overflow:visible;
         z-index:10;
         opacity:0.5;
         display:inline;
         }
         #men{
         position:relative;
         }
         li {
         display:inline;
         font-family:Shadows Into Light;
         font-size:35px;
         padding-left: 12%;
         padding-top: 5px;
         padding-right:12.05%;
         }
         li:hover {
         background-color:#795548;
         color:white;
         }
         a:link{
         text-decoration:none;
         }
         #content1_1{
         /* -webkit-animation-name: example; Chrome, Safari, Opera */
         /*   -webkit-animation-duration: 4s;  Chrome, Safari, Opera */
         position:relative;
         width:50%;
         height:100%;
         background-color:#f0563d;
         z-index:3;
         float:left;
         transition: width 2s,transform 2s;
         }
         #content1_2{
         position:relative;
         width:50%;
         height:100%;
         background-color:#23a38f;
         float:left;
         z-index:3;
         }
         #content1_2:hover{
         /*-webkit-animation-name: example;  Chrome, Safari, Opera */
         /* -webkit-animation-duration: 4s; Chrome, Safari, Opera */
         }
         #content1_1:hover{
         /*-webkit-animation-name: example;  Chrome, Safari, Opera */
         /*-webkit-animation-duration: 4s;  Chrome, Safari, Opera */
         }
         input[type='text'] ,input[type='password'] 
         {
         position:relative;
         left:20%;
         width:350px;
         height:20px;
         padding: 8px;
         font-size: 18px;
         box-shadow: 0 0 5px 1px #969696;
         }
         @-webkit-keyframes example {
0%   {-webkit-filter: grayscale(100%);}
    2%  {-webkit-filter: grayscale(0%);}
    100%  {-webkit-filter: grayscale(0%);}
    


       
         }
	

	 @-webkit-keyframes slidy {
	0% { margin-left: 0%; }
	15% { margin-left: 0%; }
	30% { margin-left: -100%; }
	40% { margin-left: -100%; }
	55% { margin-left: -200%; }
	70% { margin-left: -200%; }
	80% { margin-left: -300%; }
	100% { margin-left: -300%; }
	
	}
		
	.move {
	
	
	-webkit-animation-name: slidy; 
    	-webkit-animation-duration: 30s; 
	 -webkit-animation-iteration-count: infinite;
	
		}


         img{
         
         }
         .button{
         left:43%;
         position:relative;
         background-color:#4f83df;
         width:100px;
         height:40px;
         font-family:Josefin Slab;
         border:0px;
         font-size:15px;
         color:white;
         box-shadow:3px 3px #f2f2f2;	
         }
         .button:hover{
         right:2px;
         background-color:white;
         width:102px;
         font-family:Josefin Slab;
         border:0px;
         font-size:17px;
         color:#4f83df;
         box-shadow:4px 4px #4f83df;	
         }
         .indiv{
         font-family:Josefin Slab;
         font-size:50px;
         top:5%;
	 
         color:white;
         text-align:center;
         position:relative; 
         }
	
	.us{
		width:33.36%;
		height:100%;
		margin-left: -3.5px;  
		margin-bottom: -3.5px;  
		
		
		-webkit-filter: grayscale(100%);
	}
	.us:hover{
		width:33.36%;
		height:100%;
		
		-webkit-animation-name: example;
    		-webkit-animation-duration: 100s; 
	}
	.det{


		font-family:Chunk;
         font-size:20px;
         top:5px;
	 padding:10px;
         
	color:white;
         
         position:relative; 
		}
	#about{
		width:100%;
		height:20%;
		background-color:#795548;
		display:inline;	
		
	}
	
      </style>
   </head>
   <body>

<div id= menu>
         <ul>
            <a href="#content" >
               <li>Sign Up/Sign In</li>
            </a>
            <a href="#content2" >
               <li>Movies</li>
            </a>
            <a href="#content3" >
               <li>About</li>
            </a>
         </ul>
      </div>
      <div id="image" >
         <p class="con"> Sky productions </br>a place for<span id="change"> creative</span> directors</p>
         <p id="scrol"> Scroll Down . </p>
      </div>
      <div id="content">
<div id ="content1_1">
            <form     method="post"  action= ' <?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);
?> ' >
               </br>
               <p class = 'indiv'  >Sign In
               <p>
                  </br>
                  </br>
                  </br>
                  <input type="text" style="font-family:Josefin Slab;" placeholder="Enter email" name="email" > </input>
			 <pre style="font-family:Chunk;color:white;font-size:20px;margin-top:10px" class = 'indiv' ><?php
echo $emailErr;
?> </pre>
                  </br>
                  </br>
                  </br>
                  <input type="password"  name="password" style="font-family:Josefin Slab;" placeholder="Password"> </input>
			<pre style="font-family:Chunk;color:white;font-size:20px;margin-top:10px" class='indiv' >      <?php
echo $nameErr;
?>  </pre>
                  </br>
                  </br>
                  </br>
                  <input type="submit" name="submit" class="button" value="Sign" > 
                  </br>
                  </br>
               <p style="font-family:Josefin Slab;font-size:30px;top:5%;color:white;text-align:center;position:relative">Sign In with 
               <p>
                  </br>
                  </br>
               <p style="text-align:center;position:relative" ><img src="fb.png" id="image4" width='50' height='50'></img></p>
               </br>
               <p style="text-align:center;position:relative" ><img src="g.png" id="image4" width='50' height='50'></img></p>
               
            
            </form>
         </div>
        








 <div id ="content1_2">
            <form method="post"  action= ' <?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);
?> '>
               </br>
               <p class = 'indiv'   >Sign Up
               <p>
                  </br>
                  </br>
                  <input type="text" style="font-family:Josefin Slab;" placeholder="Enter email" name="semail"> </input>
		<pre style="font-family:Chunk;color:white;font-size:20px;margin-top:10px" class = 'indiv' >      <?php
echo $semailerr;
?>  </pre>
                  </br>
                  </br>
                  <input type="password" style="font-family:Josefin Slab;" placeholder="Password"  name="spassword"> </input>
			<pre style="font-family:Chunk;color:white;font-size:20px;margin-top:10px" class = 'indiv' >      <?php
echo $perr;
?>  </pre>
                  </br>
                  </br>
                  <input type="password"  style="font-family:Josefin Slab;" placeholder="Confirm Password" name="scpassword" > </input>
		<pre style="font-family:Chunk;color:white;font-size:20px;margin-top:10px" class = 'indiv' >      <?php
echo $cperr;
?> </pre>
                  </br>
                  </br>
                  <button type="submit" name="submit" class="button" value="submit" >Submit </button>
                  </br>
                  </br>
               <p style="font-family:Josefin Slab;font-size:30px;top:5%;color:white;text-align:center;position:relative">Sign Up Using 
               <p>
                  </br>
                  </br>
               <p style="text-align:center;position:relative" ><img src="fb.png" id="image4" width='50' height='50'></img></p>
               </br>
               <p style="text-align:center;position:relative" ><img src="g.png" id="image4" width='50' height='50'></img></p>
               
            </form>
         </div>
      </div>
      <div id="image2">
 <img src="ori3.jpg"  style="width:100%;height:100%;size:cover;position:relative;background-size: 100% 100%;z-index:-1;-webkit-filter: brightness(0.5);" >
</img>
 <p class="con">Sky productions </br>a place for<span id="cha"> creative</span> directors</p>
         <p id="scrol"> Scroll Down . </p>

	<div>
         
	</div>
      </div>



















































        <a href="Final/project2/lister.html.html" > <div id="content2"> 

	
	<div  style="width:25%;height:33.33%;background-color:black;float:left;clear:left;overflow:hidden">
	


	<div  class="move" style="width:400%;height:100%;overflow:hidden;-webkit-animation-delay: 14s;" >
	
	<img src="t2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="Jw.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="nh10.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="b3.jpg" style="width:25%;height:100%;float:left;" ></img>
		

	</div>






	</div>
	<div id="mv1" style="width:40%;height:50%;background-color:blue;float:left;">



<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden;-webkit-animation-delay: 7s;" >
	
	<img src="s.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="bb.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="n10.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="p.jpg" style="width:25%;height:100%;float:left;" ></img>
		

	</div>
</div>

	







	</div>
	<div id="mv1" style="width:35%;height:30%;background-color:green;float:left;">


	<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden" >
	
	<img src="R.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="sri.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="bahu1.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="bl.jpg" style="width:25%;height:100%;float:left;" ></img>
		

	</div>
</div>




	</div>
	<div id="mv1" style="width:25%;height:33.33%;background-color:green;float:left;clear:left;margin-top:-8.38%">


	<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden -webkit-animation-delay: 3s;" >
	
	<img src="b2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="k.JPG" style="width:25%;height:100%;float:left;" ></img>
	<img src="l.jpeg" style="width:25%;height:100%;float:left;" ></img>
	<img src="sr.jpg" style="width:25%;height:100%;float:left;" ></img>
		

	</div>
</div>	








	</div>
	<div id="mv1" style="width:20%;height:50%;background-color:black;float:left;">


	<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden-webkit-animation-delay: 5s;" >
	
	<img src="N1.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="r2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="s2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="sm.jpg" style="width:25%;height:100%;float:left;" ></img>
		

	</div>
</div>


	</div>
	<div id="mv1" style="width:20%;height:50%;background-color:green;float:left;">


<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden;-webkit-animation-delay: 1s;" >
	
	<img src="w.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="Y.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="bb2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="bm.jpg" style="width:25%;height:100%;float:left;" ></img>
	</div>
</div>







	</div>
	<div id="mv1" style="width:35%;height:70%;background-color:red;float:left;margin-top:-10.1%">




	<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden;-webkit-animation-delay: 2s;" >
	
	<img src="G.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="T.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="Y2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="g.jpg" style="width:25%;height:100%;float:left;" ></img>
	</div>
</div>





	</div>
	<div id="mv1" style="width:25%;height:33.33%;background-color:red;float:left;clear:left;margin-top:-16.8%">




	<div  style="width:100%;height:100%;overflow:hidden" >
<div   class="move" style="width:400%;height:100%;overflow:hidden;-webkit-animation-delay: 6s;" >
	
	<img src="G.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="T.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="Y2.jpg" style="width:25%;height:100%;float:left;" ></img>
	<img src="g.jpg" style="width:25%;height:100%;float:left;" ></img>
	</div>
</div>

		
	</div>






  </div>
</a>
      <div id="image3" >
	<img src="ori2.jpg"  style="width:100%;height:100%;size:cover;position:relative;background-size: 100% 100%;z-index:-1;-webkit-filter: brightness(0.5);" >
123</img>
 <p class="con">Sky productions </br>a place for<span id="ca"> creative</span> directors</p>
         <p id="scrol"> Scroll Down . </p>
	 </div>
<div id="content3">
	<div id="about">
	
	</div>
<div style="width:100%;height:50%;background-color:#282827;position:relative">
	<br>
<img src="about.png" style="width:20%;height:40%;float:right;margin-top:7%;margin-right:7%"></img>
<p style="position:relative;padding-left:20%;font-size:25" class = 'det'>Name  </p>
<p style="position:relative;padding-left:25%;color:#E25D33" class = 'det'>  <span id='one'> ->      </span> </p>
<p style="position:relative;padding-left:20%;font-size:25" class = 'det'>Qualification  </p>
	<p style="position:relative;padding-left:25%;color:#E25D33"  class = 'det'><span id='two'>  ->    </span> </p>
<p style="position:relative;padding-left:20%;font-size:25" class = 'det'> College  </p>
	
	<p style="position:relative;padding-left:25%;color:#E25D33" class = 'det'><span id='three'> ->   </span> </p>
	<br>
	
	
</div>
	<div style="width:100%;height:50%;background-color:#1B1B1B;position:relative">
	
	
	<img src='ravi.jpg' class='us' value="1"/>
	<img src='vizay.jpg' class='us' value="2"/>
	<img src='ranbir.jpg' class='us' value="3" />
	
	</div>
	
		
</div>
<script>




var Names = ["  Ravi Kumar"," Chethan","  Sai Krishna"]
var ad=["Computer Science"];
var col = ['PES UNIVERSITY'];
var anch = ' abcdefghoijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';


String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
}



function foo(name,cha){
var c = 0;
var rou=0;
var s = "";

var SI = setInterval(function(){
 
	if(String(name).charAt(c) == String(anch).charAt(rou))
	{
		s=s+String(name).charAt(c);
		console.log(name.charAt(c));
		document.getElementById(cha).innerHTML = s;
		c++;
	}
	document.getElementById(cha).innerHTML = document.getElementById(cha).innerHTML.replaceAt(c,String(anch).charAt(rou));
	rou++;
	
	if(rou==54)
	{
		rou=0;	
	}
	
	if(c==name.length)
	{
		clearInterval(SI);
		document.getElementById(cha).innerHTML = s;
	}
},5);


}
var us=document.getElementsByClassName('us');

function don()
{

if(this.getAttribute("value")=='1')
	{

		foo(Names[0],'one');
		foo(ad[0],'two');
		foo(col[0],'three');
		
	}
else if(this.getAttribute("value")=='2')
	{
		
		foo(Names[1],'one');
		foo(ad[0],'two');
		foo(col[0],'three');
	}
else if(this.getAttribute("value")=='3')
	{
		
		foo(Names[2],'one');
		foo(ad[0],'two');
		foo(col[0],'three');	
	}

}

for(v in us)
{
us[v].onmouseover=don;
}
</script>
      <!--
         <img src="bahu1.jpg" id="image4" ></img>
         <div class="content"> </div>
         -->
	
      <script> 
         var x = document.getElementById('change');
         var a = [" creative"," new"," passionate"];
	var incr=0;
         setInterval(function(){
		foo(a[incr++],'change');
		if(incr==3)
		{
			incr=0;
		}
         //document.getElementById('change').innerHTML=a[Math.floor(Math.random()*3)];
         
         }
         
         ,4000);
         
         
      </script> 
      <script>
         var scr = document.getElementById('content2').clientHeight;
         
         function fun()
         {
         prompt((window.pageYOffset/663)+"----"+screen.height);
         }
         var prev=0;
         function para()
         {
         	var vpre=window.pageYOffset;
         	if(vpre>prev)
         	{
         		$('#menu').fadeOut(1000);
         	}
         	else
         	{ 
         			$('#menu').fadeIn(1000);
         	}
         	prev=vpre;
         	var image=document.getElementById("image");
         	var image2=document.getElementById("image2");
         	var image3=document.getElementById("image3");
         	
         if(window.pageYOffset < scr){
         	image.style.top=window.pageYOffset*0.8+"px";
         }
         else if(window.pageYOffset > scr && window.pageYOffset < (scr*3)){
         	image2.style.top=((window.pageYOffset-scr-scr)*0.8)+"px";
         }
         else if(window.pageYOffset >(scr*3)&& window.pageYOffset < (scr*5)){
         	image3.style.top=((window.pageYOffset-scr-scr-scr-scr)*0.8)+"px";
         }
         /*
         var image4=document.getElementById("image4");
         if(window.pageYOffset >1.5*screen.height){
         image4.style.top=((window.pageYOffset  - screen.height - screen.height- screen.height)*0.5)+"px";
         }*/
         /*else if(window.pageYOffset < screen.width)
         {
         image2.style.top=image2.style.top-2+"px";
         }*/	
         
         }
         window.addEventListener("scroll",para);

	

      </script>
   </body>
</html>
