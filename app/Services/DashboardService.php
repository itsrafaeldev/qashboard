<?php

namespace App\Services;
use App\Models\{Category, Installment, Registry};

class DashboardService
{

    private $revenues = 0;
    private $expenses = 0;
    public function getDataCharts()
    {
        return [
            'revenues' => $this->getRevenues("2025-08"),
            'expenses' => $this->getExpenses("2025-08"),
            'balance' => $this->revenues - $this->expenses,
            'quantityRegistriesPaid' => $this->quantityRegistriesPaid("2025-08"),
            'registriesPerCategories' => $this->registriesPerCategories("2025-08")
        ];
    }

    public function registriesPaidPercent($competence)
    {
        $registries = Registry::where("competence", $competence)
            ->with([
                'installments' => function ($query) use ($competence) {
                    $query->where('competence', $competence);
                }
            ])
            ->get();

        return $registries;
    }

    public function getRevenues($competence)
    {
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

    public function quantityRegistriesPaid($competence)
    {
        $registriesTotal = Registry::with([
            'installments' => function ($query) {
                $query->where('status', true);
            }
        ])
            ->where('competence', $competence)
            ->get()
            ->count();

        $registriesPaid = Registry::with([
            'installments' => function ($query) {
                $query->where('status', true);
            }
        ])
            ->where('competence', $competence)
            ->where('status', true)
            ->orWhereHas('installments', function ($query) {
                $query->where('status', true); // registros com pelo menos uma parcela ativa
            })
            ->get()
            ->count();

        return [
        "registriesPaid"=>$registriesPaid,
        'registriesTotal'=> $registriesTotal,
        'registriesPaidPercent'=> $registriesPaid/$registriesTotal
        ];
    }

    public function registriesPerCategories($competence){


        // Agrupando por categoria
        $categoriaGroup = Registry::with('category')
            ->where('competence', $competence)
            ->get()
            ->groupBy(function ($item) {
                return $item->category->category_name;
            });

        $counts = $categoriaGroup->map(fn($registros) => count($registros));
        return $counts;
    }

    public function registriesDueOneWeek(){
        
    }



}
