<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\Reimbursement\ReimbursementService;
use App\Services\Roles\RoleService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardStaffController extends Controller
{

    protected $userService;
    protected $roleService;
    protected $reimbursementService;

    public function __construct(UserService $userService, RoleService $roleService,ReimbursementService $reimbursementService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->reimbursementService =  $reimbursementService;
    }

}
