<?php

class BMI
{
    public $feet;
    public $inches;
    public $pounds;

    public function __construct($feet, $inches, $pounds){
        (float)$this->feet = $feet;
        (float)$this->inches = $inches;
        (float)$this->pounds = $pounds;
    }

    public function calculate(){
        (float)$this->feet = $feet;
        (float)$this->inches = $inches;
        (float)$this->pounds = $pounds;
        (float)$this->total = $total;

        (float)$height = ($this->feet * 12) + $this->inches;
        (float)$this->total = (($this->pounds) / $height / $height) * 703;

        return number_format((float)$this->total, 2, '.', '');
    }
}

class Retirement
{
    public $age;
    public $salary;
    public $saved;
    public $goal;

    public function __construct($age, $salary, $saved, $goal){
        (float)$this->age = $age;
        (float)$this->salary = $salary;
        (float)$this->saved = $saved;
        (float)$this->goal = $goal;
    }

    public function calculate(){
        (float)$this->age = $age;
        (float)$this->salary = $salary;
        (float)$this->saved = $saved;
        (float)$this->goal = $goal;

        (float)$savedtotal = (float)$this->salary * (float)$this->saved * 1.35;
        (float)$total = (float)$this->goal / (float)$savedtotal;

        $this->age = $this->age + $total;

        return $this->age;

    }
}