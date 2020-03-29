<!DOCTYPE html>
<html lang="en">

<head>
    <title>BMI and Retirement Calculators</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<body>
    <h1>Main page</h1>

    <p>Please select which calculator you would like to use</p>

    <form method="post" action="main.php">
    <select name="calculator">
    <option>BMI Calculator</option>
    <option>Retirement Calculator</option>
    </select>
    <input type="submit" name="submit1">
    </form>

    <?php
        if(isset($_POST['submit1'])){
            $calc = $_POST['calculator'];
            if($calc == 'BMI Calculator'){
                header('location: bmi.php');
            }
            else {
                header('location: retirement.php');
            }
        }
    ?>


