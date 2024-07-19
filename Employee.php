<?php

abstract class Employee
{
    public $salary;
    public $coffee;
    public $reports;

    public $rank;

    public function __construct($salary, $coffee, $reports, $rank)
    {
        $this->salary = $salary;
        $this->coffee = $coffee;
        $this->reports = $reports;
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


}

class MarketologistSupervisor extends Marketologist {

}

class EngineerSupervisor extends Engineer {

}

class AnalystSupervisor extends Analyst {

}