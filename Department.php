<?php
include 'Employee.php';

class Department
{
    public string $name;


    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


}

class Purchases extends Department
{
    public array $PurchasesEmployees = [];

    public function addManager($number, $rank)
    {
        for ($i = 0; $i < $number; $i++) {

            $newManager = new Manager(500, 20, 200, $rank);
            array_push($this->PurchasesEmployees, $newManager);

        }


    }


    function displayEmployees()
    {
        foreach ($this->PurchasesEmployees as $employee) {

            $output .= "{$employee->salary} - {$employee->rank}\n";
        }
        return $output; // Возвращаем сформированную строку
    }


}

$Purchases_Department = new Purchases('Департамент закупок');
$Purchases_Department->addManager(9, 1);
$Purchases_Department->addManager(3, 2);
$Purchases_Department->addManager(2, 3);

echo $Purchases_Department->displayEmployees();

