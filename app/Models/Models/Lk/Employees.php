<?php

namespace App\Models\Models\Lk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    private $ndfl = 20;

    protected $fillable = [];

    public function salaryCalculate($employ){

        $this->isChildren($employ);

        $employ->salary = ($employ->salary - (($employ->salary / 100) * $this->ndfl));
        $employ->salary = $this->isAge($employ);
        $employ->salary = $this->isUsedCompanyCar($employ);

        return $employ->salary;

    }

    private function isAge($employ){
        return ($employ->age > 50) ? $employ->salary + self::getPercentSalary(7, $employ->salary) : $employ->salary;
    }

    private function isChildren($employ){
        return ($employ->children > 2) ? $this->ndfl - 2 : null;
    }

    private function isUsedCompanyCar($employ){
        return (!empty($employ->isCompanyCar)) ? $employ->salary - 25000 : $employ->salary;
    }

    private static function getPercentSalary($percent, $salary){

        $onePercent = $salary / 100;
        return $percent * $onePercent;

    }

}
