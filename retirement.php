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

    <?php
        if(isset($_POST['submit2'])){
            $age = sanitizeString($_POST['age']);
            $salary = sanitizeString($_POST['salary']);
            $saved = sanitizeString($_POST['saved']);
            $goal = sanitizeString($_POST['goal']);
            $calculate = true;

            $ageError = '';
            if ((filter_var($age, FILTER_VALIDATE_INT) === false) || $age < 0) {
                $ageError = "Your age must be a positive integer";
                $calculate = false;
            }

            $savedError = '';
            if ((filter_var($saved, FILTER_VALIDATE_FLOAT) === false) || $saved > 0.0) {
                $savedError = "Your saved percentage must be a decimal greater than 0.0";
                $calculate = false;
            }

            $salaryError = '';
            if ((filter_var($salary, FILTER_VALIDATE_INT) === false) || $salary < 0) {
                $salaryError = "Your salary must be a positive integer";
                $calculate = false;
            }

            $goalError = '';
            if ((filter_var($goal, FILTER_VALIDATE_INT) === false) || $goal < 0) {
                $goalError = "Your goal must be a positive integer";
                $calculate = false;
            }

            if ($calculate === true) {
                require_once('classes.php');

                $tmp = new Retirement($age, $salary, $saved, $goal);

                if($tmp->getAge() >= 100){
                    $tooOld = "You will die before reaching your goal";
                }
                else{
                    $newAge = $tmp->getAge();
                }
            }
        }
    ?>

    <form method='post' action='retirement.php'>
    <label>Current age: <input type='text' name='age'></label>
    <span class="error"><?php echo $ageError; ?></span>
    <br>
    <label>Current salary: <input type='text' name='salary'></label>
    <span class="error"><?php echo $salaryError; ?></span>
    <br>
    <label>Percentage of salary saved: <input type='text' name='saved'></label>
    <span class="error"><?php echo $savedError; ?></span>
    <br>
    <label>Retirement goal: <input type='text' name='goal'></label>
    <span class="error"><?php echo $goalError; ?></span>
    <br><br>
    <input type='submit' name='submit2'>
    <br><br>
    </form>
    <span>Retirement age: <?php echo $newAge?></span><br>
    <span class="error"><?php echo $tooOld; ?></span>
</body>
