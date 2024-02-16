<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\CompanyUserCreateDto;
use App\Models\CompanyUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait CompanyUserTrait
{

    public function __v1InitializeCompanyUser()
    {
    }

    /**
     * List new company user
     * @return mixed
     */
    public function v1CompanyUsers(?int $limit = 20): mixed
    {
        $companyUsers = CompanyUser::paginate($limit);
        return $companyUsers;
    }

    /**
     * Create new company user
     * @param CompanyUserCreateDto $dto
     * @return CompanyUser
     */
    public function v1CompanyUserCreate(CompanyUserCreateDto $dto): CompanyUser
    {

        /**
         * @TODO
         * Logic here to upload file for avatar and cover
         */

        $companyUser = new CompanyUser();
        $companyUser->user_id = $dto->user_id;
        $companyUser->company_id = $dto->company_id;
        $companyUser->status_id = $dto->status_id;
        $companyUser->employee_no = $dto->employee_no;
        $companyUser->save();
        return $companyUser;
    }

    /**
     * Show new company user
     * @param CompanyUser $companyUser
     * @return CompanyUser
     */
    public function v1CompanyUserShow(CompanyUser $companyUser): CompanyUser
    {
        return $companyUser;
    }

    /**
     * Update new company
     * @param CompanyUserCreateDto $dto
     * @param CompanyUser $companyUser
     * @return Company
     */
    public function v1CompanyUserUpdate(CompanyUserCreateDto $dto, CompanyUser $companyUser): CompanyUser
    {   
         $companyUser->user_id = $dto->user_id;
         $companyUser->company_id = $dto->company_id;
         $companyUser->status_id = $dto->status_id;
         $companyUser->employee_no = $dto->employee_no;
        $companyUser->save();
        return $companyUser;
    }

    /**
     * Show new company
     * @param CompanyUser $companyUser
     * @return CompanyUser
     */
    public function v1CompanyUserDelete(CompanyUser $companyUser): CompanyUser
    {
        $companyUser->delete();
        return $companyUser;
    }
}
