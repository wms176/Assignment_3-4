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
    <p><span class="error">All form fields must be completed for the Retirement calculator to function.</span></p>
    <br>
    <form method='post' action='retirement.php'>
    <label>Current age: <input type='text' name='age' value="<?php echo $age; ?>"></label>
    <span class="error"><?php echo $ageError; ?></span>
    <br>
    <label>Current salary: <input type='text' name='salary' value="<?php echo $salary; ?>"></label>
    <span class="error"><?php echo $salaryError; ?></span>
    <br>
    <label>Percentage of salary saved: <input type='text' name='saved' value="<?php echo $saved; ?>"></label>
    <span class="error"><?php echo $savedError; ?></span>
    <br>
    <label>Retirement goal: <input type='text' name='goal' value="<?php echo $goal; ?>"></label>
    <span class="error"><?php echo $goalError; ?></span>
    <br><br>
    <input type='submit' name='submit2'>
    </form>

    <?php
        if(isset($_POST['submit2'])){
            $age = sanitizeString($_POST['age']);
            $salary = sanitizeString($_POST['salary']);
            $saved = sanitizeString($_POST['saved']);
            $goal = sanitizeString($_POST['goal']);
            $calculate = true;

            $ageError = '';
            if ((filter_var($age, FILTER_VALIDATE_INT) === false) || $age < 0) {
                $ageError = "This number must be a positive integer";
                $calculate = false;
            }

            $salaryError = '';
            if ((filter_var($salary, FILTER_VALIDATE_INT) === false) || $salary < 0) {
                $salaryError = "This number must be a positive integer";
                $calculate = false;
            }

            $savedError = '';
            if ((filter_var($saved, FILTER_VALIDATE_INT) === false) || $saved < 0) {
                $savedError = "This number must be a positive integer";
                $calculate = false;
            }

            $goalError = '';
            if ((filter_var($goal, FILTER_VALIDATE_INT) === false) || $goal < 0) {
                $goalError = "This number must be a positive integer";
                $calculate = false;
            }

            if ($calculate === true) {
                require_once('classes.php');

                $tmp = new Retirement($age, $salary, $saved, $goal);

                if($tmp->getAge() >= 100){
                    echo "You will die before reaching your goal";
                }
                else {
                    echo $tmp->getAge();
            }
            }
            function sanitizeString($data) {
                $data = strip_tags($data);
                $data = stripslashes($data);
                $data = htmlentities($data);
                return $data;
              }
        }
    ?>
