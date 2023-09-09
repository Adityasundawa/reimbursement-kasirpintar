<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Roles\RoleService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{

    protected $userService;
    protected $roleService;


    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function viewDashboard()
    {
        $data['users'] = $this->userService->getAllUsers();
        $data['role'] = $this->roleService->getAllRoles();

        return view('pages.dashboard.index', $data);

    }

    public function delete($id)
    {
        $this->userService->deleteUser($id);

        Alert::success('Success Delete User', 'User deleted successfully');

        return redirect()->route('direktur.dashboard');
    }

    public function save(Request $request)
    {
        $data = $request->only(['nip', 'name', 'email', 'role_id', 'password']);

        // Encrypt the password before saving
        $data['password'] = bcrypt($data['password']);

        // Save data using your service
        $this->userService->createUser($data);

        return redirect()->route('direktur.dashboard')->with('success', 'Direktur added successfully');
    }


    public function edit($id, Request $request)
    {
        $user = $this->userService->getUserById($id);
        $data['user'] = $this->userService->getUserById($id);
        $data['roles'] = $this->roleService->getAllRoles();
        $data['role_selected'] = $this->roleService->getRoleByUUID($user->role_id); // Assuming this method retrieves the user's role
        return view('pages.dashboard.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role_id' => 'required|exists:roles,uuid', // Assuming roles are stored in a 'roles' table
            'password' => 'nullable|string|min:8', // You can add password validation rules
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.edit', $id) // Redirect back to the edit page with errors
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['nip', 'name', 'email', 'role_id']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }


        $this->userService->updateUser($id, $data);
        Alert::success('Success Edit User', 'User Edit successfully');

        return redirect()->route('direktur.dashboard')->with('success', 'User updated successfully');
    }
}
