<?php
include 'Employee.php';

class Department
{
    public string $name;
    public array $Employees;
    public static $Allemployers = [];
// Статические свойства для общих затрат:
    public static $totalSalaryCostAllDepartments = 0;
    public static $totalCoffeeCostAllDepartments = 0;


    public function __construct(string $name, array $Employees = [])
    {
        $this->name = $name;
        $this->Employees = $Employees;
    }

    protected $totalSalaryCost = 0;
    protected $totalCoffeeCost = 0;
    protected $totalReportsCount = 0;

    protected $averageReportExpense = 0;

    public function getTotalSalaryCost()
    {
        return $this->totalSalaryCost;
    }

    public function getTotalCoffeeCost()
    {
        return $this->totalCoffeeCost;
    }

    public function getTotalReportsCount()
    {
        return $this->totalReportsCount;
    }

    public function calculateTotals()
    {
        foreach ($this->Employees as $employee) {
            $this->totalSalaryCost += $employee->salary;
            $this->totalCoffeeCost += $employee->coffee;
            $this->totalReportsCount += $employee->reports;
            $averageReportExpense = $employee->salary / $employee->reports; // Расчет средних расходов на отчет
            $this->averageReportExpense += $averageReportExpense;
        }
    }

    public function getAverageReportExpense(): float // Метод для получения средних расходов на отчет
    {
        return $this->averageReportExpense / count($this->Employees);
    }

    public function displayDepartmentInfo()
    {
        // Считаем общее количество сотрудников
        $totalEmployees = count($this->Employees);
        // Рассчитываем общие затраты и потребление кофе
        $this->calculateTotals();
        // Формируем строку с данными
        $info = sprintf(
            "%s\nЧисло сотрудников: %d\nРасходы: %.2f\nПотребление кофе: %d\nЧисло отчетов: %d \nСредние расходы на отчет: %.2f \n--------\n",
            $this->name . ":",
            $totalEmployees,
            $this->getTotalSalaryCost(),
            $this->getTotalCoffeeCost(),
            $this->getTotalReportsCount(),
            // Вывод средних расходов на отчет
            $this->getAverageReportExpense(),
        );

        // Выводим информацию
        echo $info;
    }


    public function addManager($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newManager = new Manager();
            $newManager->setRank($rank);
            array_push($this->Employees, $newManager);
            self::$Allemployers[] = $newManager;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newManager->salary;
            Department::$totalCoffeeCostAllDepartments += $newManager->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addMarketologist($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newMarketologist = new Marketologist();
            $newMarketologist->setRank($rank);
            array_push($this->Employees, $newMarketologist);
            self::$Allemployers[] = $newMarketologist;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newMarketologist->salary;
            Department::$totalCoffeeCostAllDepartments += $newMarketologist->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления

    }

    public function addAnalyst($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newAnalyst = new Analyst();
            $newAnalyst->setRank($rank);
            array_push($this->Employees, $newAnalyst);
            self::$Allemployers[] = $newAnalyst;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newAnalyst->salary;
            Department::$totalCoffeeCostAllDepartments += $newAnalyst->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addEngineer($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newEngineer = new Engineer();
            array_push($this->Employees, $newEngineer);
            self::$Allemployers[] = $newEngineer;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newEngineer->salary;
            Department::$totalCoffeeCostAllDepartments += $newEngineer->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addManagerSupervisor($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newManagerSupervisor = new ManagerSupervisor();
            $newManagerSupervisor->setRank($rank);
            array_push($this->Employees, $newManagerSupervisor);
            self::$Allemployers[] = $newManagerSupervisor;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newManagerSupervisor->salary;
            Department::$totalCoffeeCostAllDepartments += $newManagerSupervisor->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addMarketologistSupervisor($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newMarketologistSupervisor = new MarketologistSupervisor();
            array_push($this->Employees, $newMarketologistSupervisor);
            self::$Allemployers[] = $newMarketologistSupervisor;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newMarketologistSupervisor->salary;
            Department::$totalCoffeeCostAllDepartments += $newMarketologistSupervisor->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addEngineerSupervisor($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newEngineerSupervisor = new EngineerSupervisor ();
            array_push($this->Employees, $newEngineerSupervisor);
            self::$Allemployers[] = $newEngineerSupervisor;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newEngineerSupervisor->salary;
            Department::$totalCoffeeCostAllDepartments += $newEngineerSupervisor->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

    public function addAnalystSupervisor($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {
            $newAnalystSupervisor = new AnalystSupervisor ();
            $newAnalystSupervisor->setRank($rank);
            array_push($this->Employees, $newAnalystSupervisor);
            self::$Allemployers[] = $newAnalystSupervisor;
            // Обновляем статические свойства
            Department::$totalSalaryCostAllDepartments += $newAnalystSupervisor->salary;
            Department::$totalCoffeeCostAllDepartments += $newAnalystSupervisor->coffee;

        }
        $this->calculateTotals(); // Подсчет общих затрат после добавления
    }

}

class Purchases_Department extends Department
{


}

class Department_Sales extends Department
{

}

class Advertising_Department extends Department
{

}

class Logistics_Department extends Department
{

}

$Purchases_Department = new Purchases_Department('Департамент закупок');
$Purchases_Department->addManager(9, 3);
$Purchases_Department->addManager(3, 2);
$Purchases_Department->addManager(2, 3);
$Purchases_Department->addMarketologist(2, 1);
$Purchases_Department->addManagerSupervisor(1, 2);

$Department_Sales = new Department_Sales('Департамент продаж');
$Department_Sales->addManager(12, 1);
$Department_Sales->addMarketologist(6, 1);
$Department_Sales->addAnalyst(3, 1);
$Department_Sales->addAnalyst(2, 1);
$Department_Sales->addMarketologistSupervisor(1, 2);


$Advertising_Department = new Advertising_Department('Департамент рекламы');
$Advertising_Department->addMarketologist(15, 1);
$Advertising_Department->addMarketologist(10, 2);
$Advertising_Department->addManager(8, 1);
$Advertising_Department->addEngineer(2, 1);
$Advertising_Department->addMarketologistSupervisor(1, 3);


$Logistics_Department = new Logistics_Department('Департамент логистики');
$Logistics_Department->addManager(13, 1);
$Logistics_Department->addManager(5, 2);
$Logistics_Department->addEngineer(5, 1);
$Logistics_Department->addManagerSupervisor(1, 1);


