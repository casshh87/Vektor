<?php

include 'Department.php';


$Purchases_Department->displayDepartmentInfo();
$Logistics_Department->displayDepartmentInfo();
$Advertising_Department->displayDepartmentInfo();
$Department_Sales->displayDepartmentInfo();


$totalEmployees = count(Department::$Allemployers);

echo "Общее количество сотрудников:" . "$totalEmployees"."\n";
echo "Общая зарплата всех сотрудников: " . Department::$totalSalaryCostAllDepartments . "\n";
echo "Общее количество потребляемого кофе: " . Department::$totalCoffeeCostAllDepartments . "\n";
