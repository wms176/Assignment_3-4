<!DOCTYPE html>
<html lang="en">

<head>
    <title>BMI Calculators</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<body>
    <h1>BMI Calculator</h1>
    <p>Please fill in the following form to calculate your BMI:</p>
    <br>
    <form method='post' action='bmi.php'>
    <label>Current height: 
    <select name='feet'>
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    </select>
    <label>'</label>

    <select name='inches'>
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    <option>11</option>
    </select>
    <label>"</label>
    
    </label>
    <br>
    <label>Current weight in lbs: <input type='text' name='weight'></label>
    <br><br>
    <input type='submit' name='submit3'>
    </form>

    <?php
        if(isset($_POST['submit3'])){
            $feet = $_POST['feet'];
            $inches = $_POST['inches'];
            $weight = $_POST['weight'];
            
            require_once('classes.php');

            $tmp = new BMI($feet, $inches, $weight);

            echo $tmp->getBMI();

        }
    ?>