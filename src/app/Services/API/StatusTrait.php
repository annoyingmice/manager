<?php

namespace App\Services\API;

use App\Dto\API\StatusCreateDto;
use App\Models\Status;

trait StatusTrait
{

    public function __initializeStatus()
    {
    }

    /**
     * List new status
     * @return mixed
     */
    public function statuses(?int $limit = 20): mixed
    {
        $statuses = Status::paginate($limit);
        return $statuses;
    }

    /**
     * Create new plan
     * @param StatusCreateDto $dto
     * @return Status
     */
    public function statusCreate(StatusCreateDto $dto): Status
    {
        $status = new Status();
        $status->name = $dto->name;
        $status->save();
        return $status;
    }

    /**
     * Update new plan
     * @param StatusCreateDto $dto
     * @param Status $status
     * @return Status
     */
    public function statusUpdate(StatusCreateDto $dto, Status $status): Status
    {
        $status->name = $dto->name;
        $status->save();
        return $status;
    }

    /**
     * Show new status
     * @param Status $status
     * @return Status
     */
    public function statusShow(Status $status): Status
    {
        return $status;
    }

    /**
     * Show new status
     * @param Status $status
     * @return Status
     */
    public function statusDelete(Status $status): Status
    {
        $status->delete();
        return $status;
    }
}
