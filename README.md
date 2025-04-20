<?php

class Department {
    public function __construct(
        public readonly string $name,
        public readonly array $employees,
    ) {}
}

class Emploee {
    public function __construct(
        public readonly string $name,
        public readonly float $salary,
    ) {}
}

$departmentsData = [
    'Purchases' => [
        ['count' => 9, 'rank' => 3, 'data' => ['name' => 'Manager', 'salary' => 330.]],
        ['count' => 3, 'rank' => 2, 'data' => ['name' => 'Manager', 'salary' => 220.]],
    ],
    'Sales' => [
        ['count' => 12, 'rank' => 1, 'data' => ['name' => 'Manager', 'salary' => 110.]],
    ],
];

$departments = [];
foreach ($departmentsData as $departmentName => $departmentPositions) {
    $employees = [];
    foreach ($departmentPositions as $position) {
        foreach (range(1, $position['count']) as $index) {
            $employees[] = new Emploee(...$position['data']);
        }
    }

    $departments[] = new Department($departmentName, $employees);
}

$totalSalary = 0;
foreach ($departments as $department) {
    foreach ($department->employees as $employee) {
        $totalSalary += $employee->salary;
    }
}

var_dump($totalSalary);
