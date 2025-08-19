<?php

namespace App\Services;
use App\Models\{Category, Installment, Registry};

class DashboardService{

    private $revenues = 0;
    private $expenses = 0;
    public function getDataCharts(){
        return [
            'revenues' => $this->getRevenues("2025-08"),
            'expenses' => $this->getExpenses("2025-08"),
            'balance' => $this->revenues - $this->expenses
        ];
    }

    public function registriesPaidPercent($competencia){

    }

    public function getRevenues($competencia){
        $registryIds = Registry::where("transaction_id", 1)
        ->where('competencia', $competencia)
        ->pluck('id');

        $this->revenues = Installment::whereIn('registry_id', $registryIds)
            ->distinct()
            ->sum('amount');

        return $this->revenues;
    }

    public function getExpenses($competencia)
    {
        $registryIds = Registry::where("transaction_id", 2)
            ->where('competencia', $competencia)
            ->pluck('id');

        $this->expenses = Installment::whereIn('registry_id', $registryIds)
            ->distinct()
            ->sum('amount');

        return $this->expenses;
    }

    public function getLatePayments($competencia){

    }



}
