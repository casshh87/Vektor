<?php
include 'Employee.php';

class Department
{
    public string $name;
    public array $Employees;

    public function __construct(string $name, array $Employees=[])
    {
        $this->name = $name;
        $this->Employees = $Employees;
    }


    public function addManager($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newManager = new Manager('ме', 500, 20, 200, 'отчеты', $rank);
            array_push($this->Employees, $newManager);

        }


    }

    public function addMarketologist($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newMarketologist = new Marketologist('ме', 400, 15, 150, 'отчеты', $rank);
            array_push($this->Employees, $newMarketologist);

        }


    }

    public function addManagerSupervisor($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newManagerSupervisor = new ManagerSupervisor('Руководитель менеджер', 400, 15,150,'',$rank );
            array_push($this->Employees, $newManagerSupervisor);

        }


    }

}

class Purchases_Department extends Department
{

    public function displayEmployees(): string
    {
        $output = '<table border="1">';
        $output .= '<tr><th colspan="4">Департамент Закупок</th></tr>'; // Заголовок таблицы
        $output .= '<tr><th>Зарплата</th><th>Имя</th><th>Ранг</th><th>Отчеты</th></tr>'; // Заголовки столбцов

        foreach ($this->Employees as $employee) {
            $output .= "<tr>";
            $output .= "<td>{$employee->salary}</td>"; // Зарплата
            $output .= "<td>{$employee->name}</td>"; // Имя

            $output .= "<td>{$employee->rank}</td>"; // Ранг
            $output .= "<td>{$employee->reports_name}</td>";
            $output .= "</tr>";
        }

        $output .= '</table>';
        return $output;
    }

}

$Purchases_Department = new Purchases_Department('Департамент закупок');
$Purchases_Department->addManager(9, 1);
$Purchases_Department->addManager(3, 2);
$Purchases_Department->addManager(2, 3);
$Purchases_Department->addMarketologist(2,1);
$Purchases_Department->addManagerSupervisor(1,2);

echo $Purchases_Department ->displayEmployees();

//var_dump($Purchases_Department->Employees);

//print_r($Purchases_Department->Employees);

