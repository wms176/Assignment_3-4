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
    <?php
        if(isset($_POST['submit3'])){
            $feet = $_POST['feet'];
            $inches = $_POST['inches'];
            $weight = sanitizeString($_POST['weight']);
            $calculate = true;

            $weightError = '';
            if ((filter_var($weight, FILTER_VALIDATE_INT) === false) || $weight < 0) {
                $weightError = "Your weight must be a positive integer";
                $calculate = false;
            }

            if ($feet == 0 && $inches == 0) {
                $calculateError = "Your height must be taller than 0 feet and 0 inches";
                $calculate = false;
            }
            
            if ($calculate === true) {
                require_once('classes.php');

                $tmp = new BMI($feet, $inches, $weight);

                $bmi = $tmp->getBMI();

                if ($bmi < 18.5) {
                    $weightClass = "You are underweight";
                }

                if ($bmi >= 18.5 && $bmi <= 24.9) {
                    $weightClass = "You are normal weight";
                }

                if ($bmi >= 25 && $bmi <= 29.9) {
                    $weightClass = "You are overweight";
                }

                if ($bmi > 30) {
                    $weightClass = "You are obese";
                }
            }

        }
        function sanitizeString($data) {
            $data = strip_tags($data);
            $data = stripslashes($data);
            $data = htmlentities($data);
            return $data;
          }
    ?>
    <form method='post' action='bmi.php'>
    <label>Current height: 
    <select name='feet' value="<?php echo $feet; ?>">
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

    <select name='inches' value="<?php echo $inches; ?>">
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
    <span class='error'><?php echo $calculateError; ?></span>
    </label>
    <br>
    <label>Current weight in lbs: <input type='text' name='weight' value="<?php echo $weight; ?>"></label>
    <span class='error'><?php echo $weightError; ?></span>
    <br><br>
    <input type='submit' name='submit3'>
    </form>
    <span>Your BMI: <?php echo $bmi; ?></span><br>
    <span style="font-weight: bold;"><?php echo $weightClass; ?></span>
</body>