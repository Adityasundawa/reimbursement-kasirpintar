<?php


namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use RealRashid\SweetAlert\Facades\Alert;

class UserServicelmp implements UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function createUser(array $attributes)
    {
        Alert::success('Success Add User', 'User Add successfully');
        return $this->userRepository->create($attributes);
    }

    public function updateUser($id, array $attributes)
    {
          Alert::success('Success Edit User', 'User Edit successfully');
        return $this->userRepository->update($id, $attributes);
    }

    public function deleteUser($id)
    {
        Alert::success('Success Delete User', 'User deleted successfully');
        return $this->userRepository->delete($id);
    }

    public function getAllRoles()
{
    return $this->roleRepository->all(); // Assuming you have a separate repository for roles.
}
}
