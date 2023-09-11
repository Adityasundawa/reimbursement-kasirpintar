<?php

namespace App\Http\Controllers\Staff;

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

class DashboardStaffController extends Controller
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

        $user = auth()->user()->id;
        $data['reimbursements'] = $this->reimbursementService->getByUser($user);
        return view('pages.reimbusment.index', $data);
    }

    public function viewReimbursementById($id)
    {

        $reimbursement = $this->reimbursementService->getById($id);
        $data['reimbursements'] = $this->reimbursementService->getById($id);
        $data['user'] = $this->userService->getUserById($reimbursement->user_id);
        return view('pages.reimbusment.viewReimbursementById', $data);
    }

    public function addReimbursement()
    {
        return view('pages.reimbusment.addReimbursement');
    }

    public function uploadReimbursement(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
            'pdf_file' => 'required|max:2048',
        ]);

        // Upload the PDF
        $pdfPath = $request->file('pdf_file');
        $pdfName = $pdfPath->getClientOriginalName();
        $pdfPath->move('file/reimbusments',$pdfPath->getClientOriginalName());

        // Create data for the reimbursement
        $data = [
            'subject' => $validatedData['subject'],
            'description' => $validatedData['description'],
            'file' => $pdfName,
            'user_id' => auth()->user()->id,
            'user_created' => auth()->user()->id,
            'amount' => 1,
            'description_reason' => '',
        ];


        // Call the service to create the reimbursement
        $this->reimbursementService->create($data);

        return redirect()->back();
    }
}
