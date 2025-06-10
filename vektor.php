<?php

class Company
{
    
    public array $departments = [];
 // Добавляем департамент в компанию
 public function addDepartment(Department $department): void
 {
     $this->departments[] = $department;
 }

 // Общее количество сотрудников во всех департаментах
 public function getTotalEmployees(): int
 {
     $total = 0;
     foreach ($this->departments as $department) {
         $total += $department->getTotalEmployee();
     }
     return $total;
 }

 // Общая зарплата по компании
 public function getTotalSalary(): float
 {
     $total = 0;
     foreach ($this->departments as $department) {
         $total += $department->getTotalSalary();
     }
     return $total;
 }

 // Общее потребление кофе
 public function getTotalCoffee(): float
 {
     $total = 0;
     foreach ($this->departments as $department) {
         $total += $department->getTotalCoffee();
     }
     return $total;
 }

 // Общее количество отчётов
 public function getTotalPages(): float
 {
     $total = 0;
     foreach ($this->departments as $department) {
         $total += $department->getTotalPages();
     }
     return $total;
 }

 // Средняя зарплата на страницу по компании
 public function getAvgSalaryPerPage(): float
 {
     $totalPages = $this->getTotalPages();
     return $totalPages > 0 ? $this->getTotalSalary() / $totalPages : 0;
 }

 // Полная статистика по компании (аналог getStats для Department)
 public function getCompanyStats(): string
 {
     $stats = [
         'Всего департаментов' => count($this->departments),
         'Всего сотрудников' => $this->getTotalEmployees(),
         'Общая зарплата' => round($this->getTotalSalary(), 2) . ' у.е.',
         'Общее потребление кофе' => round($this->getTotalCoffee(), 2) . ' л',
         'Всего отчётов' => $this->getTotalPages() . ' стр.',
         'Средняя зарплата на страницу' => round($this->getAvgSalaryPerPage(), 2) . ' у.е./стр.'
     ];
     
     $output = "СТАТИСТИКА КОМПАНИИ:\n";
     $output .= str_repeat("=", 40) . "\n";
     
     foreach ($stats as $key => $value) {
         $output .= sprintf("%-25s | %s\n", $key, $value);
     }
     
     return $output;
 }

}



class Employee
{

    public string $name;
    public float $rank;
    public bool $boss;
    public float $salary;
    public float $coffee;
    public float $pages;

     // Базовая конфигурация для каждого типа сотрудника
     private const EMPLOYEE_TYPES = [
        'менеджер' => [
            'base_salary' => 500,
            'base_coffee' => 20,
            'base_pages' => 200
        ],
        'маркетолог' => [
            'base_salary' => 400,
            'base_coffee' => 15,
            'base_pages' => 150
        ],
        'инженер' => [
            'base_salary' => 200,
            'base_coffee' => 5,
            'base_pages' => 50
        ],
        'аналитик' => [
            'base_salary' => 800,
            'base_coffee' => 50,
            'base_pages' => 5
        ]
    ];

    public function __construct($name, $rank, $boss)
    {
        if (!isset(self::EMPLOYEE_TYPES[$name])) {
            throw new InvalidArgumentException("Неизвестный тип сотрудника: $name");
        }

        $this->name = $name;
        $this->rank = $rank;
        $this->boss = $boss;
       

          // Устанавливаем базовые значения
          $this->salary = self::EMPLOYEE_TYPES[$name]['base_salary'];
          $this->coffee = self::EMPLOYEE_TYPES[$name]['base_coffee'];
          $this->pages = self::EMPLOYEE_TYPES[$name]['base_pages'];

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

  
    public function addEmployee(string $type, float $rank, bool $is_boss = false, int $count = 1)
    {
        $employee = new Employee($type, $rank, $is_boss);
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

    public function getStats() {
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

$company = new Company();

$Procurement_Department = new Department('Департамент закупок');
$Procurement_Department->addEmployee('менеджер', 1, false, 9);
$Procurement_Department->addEmployee('менеджер', 2, false, 3);
$Procurement_Department->addEmployee('менеджер', 3, false, 2);
$Procurement_Department->addEmployee('маркетолог', 1, false, 2);
$Procurement_Department->addEmployee('менеджер', 2, true, 1);

$Sales_Department = new Department('Департамент продаж');
$Sales_Department->addEmployee('менеджер', 1, false, 12);
$Sales_Department->addEmployee('маркетолог', 1, false, 6);
$Sales_Department->addEmployee('аналитик', 1, false, 3);
$Sales_Department->addEmployee('аналитик', 2, false, 2);
$Sales_Department->addEmployee('маркетолог', 2, true, 1);

$Advertising_Department = new Department ('Департамент рекламы');
$Advertising_Department->addEmployee('маркетолог', 1, false, 15);
$Advertising_Department->addEmployee('маркетолог', 2, false, 10);
$Advertising_Department->addEmployee('менеджер', 1, false, 8);
$Advertising_Department->addEmployee('инженер', 1, false, 2);
$Advertising_Department->addEmployee('маркетолог', 1, true, 1);

$Logistics_Department = new Department('Департамент логистики');
$Logistics_Department->addEmployee('менеджер', 1, false, 13);
$Logistics_Department->addEmployee('менеджер', 2, false, 5);
$Logistics_Department->addEmployee('инженер', 1, false, 5);
$Logistics_Department->addEmployee('менеджер', 1, true, 1);

$company->addDepartment($Procurement_Department);
$company->addDepartment($Sales_Department);
$company->addDepartment($Advertising_Department);
$company->addDepartment($Logistics_Department);


foreach ($company->departments as $department) {
    echo $department->getStats() . "\n";
}

// Выводим общую статистику по компании
echo $company->getCompanyStats();