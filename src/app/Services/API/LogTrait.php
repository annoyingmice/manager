<?php

namespace App\Services\API;

use App\Dto\API\LogCreateDto;
use App\Models\Log;

trait LogTrait
{

    public function __initializeLog()
    {
    }

    /**
     * List new role
     * @return mixed
     */
    public function logs(?int $limit = 20): mixed
    {
        $logs = Log::paginate($limit);
        return $logs;
    }

    /**
     * Create new permission
     * @param LogCreateDto $dto
     * @return Log
     */
    public function logCreate(LogCreateDto $dto): Log
    {
        $log = new Log();
        // $log->name = $dto->name;
        // $log->owner = $dto->owner;
        // $log->save();
        return $log;
    }

    /**
     * Update new role
     * @param LogCreateDto $dto
     * @param Log $log
     * @return Log
     */
    public function logUpdate(LogCreateDto $dto, Log $log): Log
    {
        // $permission->name = $dto->name;
        // $permission->owner = $dto->owner;
        // $permission->save();
        return $log;
    }

    /**
     * Show new permission
     * @param Log $log
     * @return Log
     */
    public function logShow(Log $log): Log
    {
        return $log;
    }

    /**
     * Show new permission
     * @param Log $log
     * @return Log
     */
    public function logDelete(Log $log): Log
    {
        $log->delete();
        return $log;
    }
}
