<?php

namespace App\Services\API;

use App\Dto\API\RequestTypeCreateDto;
use App\Dto\API\RoleCreateDto;
use App\Models\RequestType;

trait RequestTypeTrait
{

    public function __initializeRequestType()
    {
    }

    /**
     * List new request type
     * @return mixed
     */
    public function requestTypes(?int $limit = 20): mixed
    {
        $requestTypes = RequestType::paginate($limit);
        return $requestTypes;
    }

    /**
     * Create new request type
     * @param RequestTypeCreateDto $dto
     * @return RequestType
     */
    public function requestTypeCreate(RequestTypeCreateDto $dto): RequestType
    {
        $requestTypes = new RequestType();
        $requestTypes->name = $dto->name;
        $requestTypes->save();
        return $requestTypes;
    }

    /**
     * Update new request type
     * @param RequestTypeCreateDto $dto
     * @param RequestType $requestType
     * @return RequestType
     */
    public function requestTypeUpdate(RequestTypeCreateDto $dto, RequestType $requestType): RequestType
    {
        $requestType->name = $dto->name;
        $requestType->save();
        return $requestType;
    }

    /**
     * Show new request type
     * @param RequestType $requestType
     * @return RequestType
     */
    public function requestTypeShow(RequestType $requestType): RequestType
    {
        return $requestType;
    }

    /**
     * Show new request type
     * @param RequestType $requestType
     * @return RequestType
     */
    public function requestTypeDelete(RequestType $requestType): RequestType
    {
        $requestType->delete();
        return $requestType;
    }
}
