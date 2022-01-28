<?php
if(isset($_POST['submit']))
{
	$nameerr=$passerr=$pherr=$emailerr="";
	//Name Validation
	$name=$_POST['name'];
	if(empty($name))
	{
		$nameerr="You must provide a Username";
	}
	else
	{
		$pat="/^[A-Za-z\s]+$/";
	if(preg_match($pat,$name))
		{
			$pat2="/^[A-Z][a-z]+(\s)[A-Z][a-z]+(\s)?[A-Z]?[a-z]*$/";
			if(preg_match($pat2,$name))
			{
				echo "Name=".$name;
			}
			else
			{
				$nameerr="Name Must be in this Format 'Dharma Pradhan'";
			}
			
	    }
	else
	{
		$nameerr="Name must contain all characters(digits and symbols are not allowed)";
	}
	}
}
?>
<html>
<head> <title> Example of validation </title>
</head>
<body>
<h1>ENTER THE DETAILS</h1>
<form method="post">
NAME:
<input type="text" name="name"> <?php if(isset($_POST['submit'])){ echo $nameerr; } ?><br>
PASSWORD:
<input type="text" name="pass" value= " "><br>
MOBILE:
<input type="text" name="phone" value= " "><br>
EMAIL:
<input type="text" name="email" value= " "><br>
MALE 
<input type="radio" name="gender" value="male">
FEMALE
<input type="radio" name="gender" value="female"><br>
SELECT COUNTRY:      
<select name="country">
<option value=1></option>
<option >INDIA</option>
<option >SRILANKA</option>
<option >CHINA</option>
<option >JAPAN</option>
</select> <br>
SELECT YOUR LANGUAGES: <br>

<input type="checkbox" name="language[]" value="c">C <br>
<input type="checkbox" name="language[]" value="c++">C++<br>
<input type="checkbox" name="language[]" value="java">Java <br>
<input type="checkbox" name="language[]" value="php">PHP<br>
<input type="checkbox" name="language[]" value="dbms">DBMS<br>
<input type="checkbox" name="language[]" value="c#">C#<br>

<input type="submit" name="submit" value="submit">
</form>
</body>
</html>