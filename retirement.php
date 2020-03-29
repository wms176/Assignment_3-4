<!DOCTYPE html>
<html lang="en">

<head>
    <title>Retirement Calculators</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<body>
    <h1>Retirement Calculator</h1>
    <p>Please fill in the following form to calculate your retirement age:</p>
    <br>
    <form method='post' action='retirement.php'>
    <label>Current age: <input type='text' name='age'></label>
    <br>
    <label>Current salary: <input type='text' name='salary'></label>
    <br>
    <label>Percentage of salary saved: <input type='text' name='saved'></label>
    <br>
    <label>Retirement goal: <input type='text' name='goal'></label>
    <br><br>
    <input type='submit' name='submit2'>
    </form>

    <?php
        if(isset($_POST['submit2'])){
            $age = $_POST['age'];
            $salary = $_POST['salary'];
            $saved = $_POST['saved'];
            $goal = $_POST['goal'];


            require_once('classes.php');

            $tmp = new Retirement($age, $salary, $saved, $goal);

            echo $tmp->getBMI();
           /*  (float)$savedtotal = (float)$salary * (float)$saved;
            (float)$tmp = (float)$savedtotal  * 1.35;
            (float)$total = (float)$goal / (float)$tmp;

            $age = $age + (float)$total; */
           
        }
    ?>
