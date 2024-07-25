<?php

abstract class Employee
{
    public $name;
    public float $salary;
    public int $coffee;
    public int $reports;
    public string $reports_name;
    public int $rank = 0; // Значение по умолчанию

    public function __construct($name, $salary, $coffee, $reports, $reports_name)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->coffee = $coffee;
        $this->reports = $reports;
        $this->reports_name = $reports_name;

    }
    public function getReports(): int {
        return $this->reports;
    }
    public function setRank(int $rank): void //Добавляем динамическое свойство ранг
    {
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

    public function __construct($name = "Менеджер", $salary = 500, $coffee = 20, $reports = 200, $reports_name = 'отчеты')
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
    }

}

class Marketologist extends Employee
{
    public function __construct($name = 'Маркетолог', $salary = 200, $coffee = 15, $reports = 150, $reports_name = 'отчеты')
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
    }
}

class Engineer extends Employee
{
    public function __construct($name = 'Инженер', $salary = 200, $coffee = 5, $reports = 50, $reports_name = 'чертежи')
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
    }
}

class Analyst extends Employee
{
    public function __construct($name = "Аналитик", $salary = 800, $coffee = 50, $reports = 5, $reports_name = "Стратегические исследования")
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
    }
}

class ManagerSupervisor extends Manager
{
    public function __construct($name = 'Руководитель Менеджер', $salary=500, $coffee=20, $reports=200, $reports_name='отчеты')
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
        $this->salary *= 2;
        $this->coffee *= 2;
    }
}
class MarketologistSupervisor extends Marketologist
{
    public function __construct($name='Руководитель Маректолог', $salary=200, $coffee=15, $reports=150, $reports_name='отчеты')
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name); // Используем конструктор родителя
        ;$this->salary *= 2; // Удваиваем зарплату
        $this->coffee *= 2; // Удваиваем количество кофе
    }
}

class EngineerSupervisor extends Engineer
{
    public function __construct($name, $salary, $coffee, $reports, $reports_name)
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
        $this->name = 'Руководитель Инженер';
        $this->salary *= 2;
        $this->coffee *= 2;

    }
}

class AnalystSupervisor extends Analyst
{
    public function __construct($name, $salary, $coffee, $reports, $reports_name)
    {
        parent::__construct($name, $salary, $coffee, $reports, $reports_name);
        $this->name = 'Руководитель Аналитик';
        $this->salary *= 2;
        $this->coffee *= 2;

    }
}