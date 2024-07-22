<?php

abstract class Employee
{
    public $name;
    public $salary;
    public $coffee;
    public $reports;
    public $reports_name;
    public $rank;

    public function __construct($name, $salary, $coffee, $reports, $reports_name, $rank)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->coffee = $coffee;
        $this->reports = $reports;
        $this->reports_name = $reports_name;
        $this->rank = $rank;

        switch ($this->rank) {
            case 2:
                $this->salary *= 1.25; // Увеличиваем на 25%
                break;
            case 3:
                $this->salary *= 1.5; // Увеличиваем на 50%
                break;
        }
    }

}


class Manager extends Employee
{

}

class Marketologist extends Employee
{

}

class Engineer extends Employee
{

}

class Analyst extends Employee
{


}


class ManagerSupervisor extends Manager {

    public function __construct($name, $salary, $coffee, $reports, $reports_name, $rank)
    {
        parent::__construct($name, $salary * 1.5, $coffee * 2, $reports, $reports_name, $rank); // Увеличиваем зарплату на 50%
    }

}

class MarketologistSupervisor extends Marketologist {

}

class EngineerSupervisor extends Engineer {

}

class AnalystSupervisor extends Analyst {

}