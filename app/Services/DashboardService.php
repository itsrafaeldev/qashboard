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
            'balance' => $this->revenues - $this->expenses,
            'registriesPaidPercent'=>$this->registriesPaidPercent("2025-08")
        ];
    }

    public function registriesPaidPercent($competence){
        $registries = Registry::where("competence", $competence)
            ->with([
                'installments' => function ($query) use ($competence) {
                    $query->where('competence', $competence);
        }])
        ->get();

        return $registries;

    }

    public function getRevenues($competence){
        $registryIds = Registry::where("transaction_id", 1)
        ->where('competence', $competence)
        ->pluck('id');

        $this->revenues = Installment::whereIn('registry_id', $registryIds)
            ->distinct()
            ->sum('amount');

        return $this->revenues;
    }

    public function getExpenses($competence)
    {
        $registryIds = Registry::where("transaction_id", 2)
            ->where('competence', $competence)
            ->pluck('id');

        $this->expenses = Installment::whereIn('registry_id', $registryIds)
            ->distinct()
            ->sum('amount');

        return $this->expenses;
    }

    public function getLatePayments($competencia){
        
    }

    public function quantityRegistriesPaid($competence){
        $registries = Registry::where("competence", $competence)
            ->with([
                'installments' => function ($query) use ($competence) {
                    $query->where('competence', $competence)
                    ->where('status', true);
                }
            ]);
        return $registries->count();
    }



}
