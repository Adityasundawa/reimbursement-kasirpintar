<?php

namespace App\Services\Reimbursement;

use App\Models\Reimbursement;
use App\Repositories\Reimbursement\ReimbursementsRepository;
use App\Services\Reimbursement\ReimbursementsService;
use RealRashid\SweetAlert\Facades\Alert;

class ReimbursementServiceImp implements ReimbursementService
{
    protected $reimbursementsRepository;

    public function __construct(ReimbursementsRepository $reimbursementsRepository)
    {
        $this->reimbursementsRepository = $reimbursementsRepository;
    }
    public function getAll(): iterable
    {
        return $this->reimbursementsRepository->all();
    }

    public function getById(int $id): ?Reimbursement
    {
        return $this->reimbursementsRepository->find($id);
    }

    public function markAsRead($id)
    {
        return $this->reimbursementsRepository->markAsRead($id);
    }

    public function updateReimbursement($id, $data)
    {
        Alert::success('Success Status Changed', 'User Status Changed successfully');
        return $this->reimbursementsRepository->update($id, $data);
    }

    public function getByUser($user)
    {
        return $this->reimbursementsRepository->getByUser($user);
    }

    public function create($data)
    {


        Alert::success('Success Add Reimbursements', 'Reimbursements Add successfully');
        $this->reimbursementsRepository->create($data);
    }


    // Implement the methods defined in the interface
}
