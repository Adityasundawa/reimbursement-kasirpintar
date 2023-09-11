<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\Reimbursement\ReimbursementService;
use App\Services\Roles\RoleService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardFinanceController extends Controller
{

    protected $userService;
    protected $roleService;
    protected $reimbursementService;

    public function __construct(UserService $userService, RoleService $roleService, ReimbursementService $reimbursementService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->reimbursementService =  $reimbursementService;
    }

    public function viewDashboard()
    {
        $data['reimbursements'] = $this->reimbursementService->getAll();
        return view('pages.finance.index', $data);
    }
    
    public function viewReimbursementById($id)
    {

        $reimbursement = $this->reimbursementService->getById($id);
        $data['reimbursements'] = $this->reimbursementService->getById($id);
        $data['user'] = $this->userService->getUserById($reimbursement->user_id);
        return view('pages.reimbusment.viewReimbursementById', $data);
    }

}
