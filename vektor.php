<?php

class Company
{
    //Департамент закупок: 9×ме1, 3×ме2, 2×ме3, 2×ма1 + руководитель департамента ме2
    public array $departments = [];
}



class Employee
{

    public string $name;
    public float $rank;
    public bool $boss;
    public float $salary;
    public float $coffee;
    public float $pages;

    public function __construct($name, $rank, $boss, $salary, $coffee, $pages)
    {
        $this->name = $name;
        $this->rank = $rank;
        $this->boss = $boss;
        $this->salary = $salary;
        $this->coffee = $coffee;
        $this->pages = $pages;

        // Логика изменения свойств в зависимости от ранга
        if ($this->rank == 2) {
            $this->salary *= 1.25; // Увеличиваем зарплату на 25%
        } elseif ($this->rank == 3) {
            $this->salary *= 1.5;
        }
        if ($this->boss == true) {
            $this->salary *= 1.5;
        }
        
        if ($this->boss == true) {
            $this->coffee *= 1.5;
            $this->pages = 0;
        }
    }
}

class Department
{
    private $name;

    private $employees = [];



    public function __construct($name)
    {
        $this->name = $name;
    }
    function addEmployee(Employee $employee, int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->employees[] = clone $employee;
        }
    }

    public function getTotalEmployee() {
        return count($this->employees);
    }

    public function  getTotalSalary() {
        $total = 0;
        foreach($this->employees as $employee) {
            $total+= $employee->salary;
        }
  return $total;  
    }

    public function  getTotalCoffee() {
        $total = 0;
        foreach($this->employees as $employee) {
            $total+= $employee->coffee;
        }
  return $total;  
    }
    
    public function  getTotalPages() {
        $total = 0;
        foreach($this->employees as $employee) {
            $total+= $employee->pages;
        }
  return $total;  
    }

    public function getSalaryPerPage(): float
    {
        $totalSalary = $this->getTotalSalary();
        $totalPages = $this->getTotalPages();
        
        // Чтобы избежать деления на 0
        if ($totalPages == 0) {
            return 0;
        }
        
        return $totalSalary / $totalPages;
    }

    public function getStats(): string {
    $stats = [
        'Название отдела' => $this->name,
        'Всего сотрудников' => $this->getTotalEmployee(),
        'Общая зарплата' => round($this->getTotalSalary(), 2) . ' у.е.',
        'Общее потребление кофе' => round($this->getTotalCoffee(), 2) . ' л',
        'Число отчётов' => $this->getTotalPages() . ' стр.',
        'Зарплата на страницу' => round($this->getSalaryPerPage(), 2) . ' у.е./стр.'
    ];
    
    $output = "Статистика отдела:\n";
    $output .= str_repeat("=", 40) . "\n";
    
    foreach ($stats as $key => $value) {
        $output .= sprintf("%-20s | %s\n", $key, $value);
    }
    
    return $output;
}

}


$Procurement_Department = new Department('Отдел Закупок');
$Procurement_Department->addEmployee(new Employee('менеджер', 2, false, 150, 15, 20), 9);
$Procurement_Department->addEmployee(new Employee('менеджер', 2, true, 150, 15, 20), 1);

/*
$totalEmployee = $Procurement_Department->getTotalEmployee();
echo "Всего сотрудников в отделе" . $totalEmployee;
$totalSalary = $Procurement_Department->getTotalSalary();
echo "Общая зарплата отдела: " . $totalSalary;
$totalCoffee = $Procurement_Department->getTotalCoffee();
echo "Общая кофе отдела: " . $totalCoffee;
$totalPages = $Procurement_Department->getTotalPages();
echo "Общая отчеты отдела: " . $totalPages;
$salaryPerPage = $Procurement_Department->getSalaryPerPage();
echo "Средний расход зарплаты на одну страницу: " . round($salaryPerPage, 2) . "\n";
*/

print_r($Procurement_Department->getStats());