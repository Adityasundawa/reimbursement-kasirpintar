<?php

namespace App\Repositories\Reimbursement;

use App\Models\Reimbursement;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ReimbursementsRepositoryImp extends BaseRepository implements ReimbursementsRepository
{
    protected $model;

    public function __construct(Reimbursement $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function markAsRead($id)
{
    $reimbursement = $this->model->findOrFail($id);
    $reimbursement->update(['read' => true]);
    return $reimbursement;
}

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $attributes)
    {
        $role = $this->find($id);
        $role->update($attributes);
        return $role;
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    public function getByUser($user)
    {
        return $this->model->where('user_id', $user)->get();
    }





    // Implement specific methods for the reimbursements repository if needed
}
