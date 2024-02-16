<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\UserRequestCreateDto;
use App\Models\UserRequest;

trait UserRequestTrait
{

    public function __v1InitializeUserRequest()
    {
    }

    /**
     * List new plans
     * @return mixed
     */
    public function v1UserRequests(?int $limit = 20): mixed
    {
        $userRequests = UserRequest::paginate($limit);
        return $userRequests;
    }

    /**
     * Create new request
     * @param UserRequestCreateDto $dto
     * @return UserRequest
     */
    public function v1UserRequestCreate(UserRequestCreateDto $dto): UserRequest
    {
        $meta = [];
        $userRequest = new UserRequest();
        $userRequest->company_id = $dto->company_id;
        $userRequest->user_id = $dto->user_id;
        $userRequest->request_type_id = $dto->request_type_id;
        $userRequest->status_id = $dto->status_id;
        $userRequest->meta = json_encode($meta);
        $userRequest->save();
        return $userRequest;
    }

    /**
     * Update new user request
     * @param UserRequestCreateDto $dto
     * @param UserRequest $userRequest
     * @return UserRequest
     */
    public function v1UserRequestUpdate(UserRequestCreateDto $dto, UserRequest $userRequest): UserRequest
    {
        $meta = [];
        $userRequest->company_id = $dto->company_id;
        $userRequest->user_id = $dto->user_id;
        $userRequest->request_type_id = $dto->request_type_id;
        $userRequest->status_id = $dto->status_id;
        $userRequest->meta = json_encode($meta);
        $userRequest->save();
        return $userRequest;
    }

    /**
     * Show new user request
     * @param UserRequest $userRequest
     * @return UserRequest
     */
    public function v1UserRequestShow(UserRequest $userRequest): UserRequest
    {
        return $userRequest;
    }

    /**
     * Show new userRequest
     * @param UserRequest $userRequest
     * @return UserRequest
     */
    public function v1UserRequestDelete(UserRequest $userRequest): UserRequest
    {
        $userRequest->delete();
        return $userRequest;
    }
}
