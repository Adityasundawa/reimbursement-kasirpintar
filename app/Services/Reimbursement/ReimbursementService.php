<?php

namespace App\Services\Reimbursement;

use App\Models\Reimbursement;
use Illuminate\Support\Collection;
use App\Models\User;

interface ReimbursementService
{
    public function getAll(): iterable;
    public function getById(int $id): ?Reimbursement;
    public function markAsRead($id);
    public function updateReimbursement($id, $data);
    public function getByUser($user);
    public function create($data);
}
