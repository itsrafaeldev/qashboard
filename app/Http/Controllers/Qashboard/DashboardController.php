<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\{Registry, Category, Transaction, Installment};
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(public DashboardService $dashboardService) {

    }
    public function list()
    {
        return view('dashboard.list');
    }

    public function getDataCharts(){
        $dataCharts = $this->dashboardService->getDataCharts();
        return $dataCharts;
    }




}
