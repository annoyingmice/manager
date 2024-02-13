<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\CompanyCreateDto;
use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait CompanyTrait
{

    public function __v1InitializeCompany()
    {
    }

    /**
     * List new company
     * @return mixed
     */
    public function v1Companies(?int $limit = 20): mixed
    {
        $companies = Company::paginate($limit);
        return $companies;
    }

    /**
     * Create new company
     * @param CompanyCreateDto $dto
     * @return Company
     */
    public function v1CompanyCreate(CompanyCreateDto $dto): Company
    {

        /**
         * @TODO
         * Logic here to upload file for avatar and cover
         */

        $company = new Company();
        $company->avatar = $dto->avatar;
        $company->cover = $dto->cover;
        $company->name = $dto->name;
        $company->email = $dto->email;
        $company->tel = $dto->tel;
        $company->phone = $dto->phone;
        $company->address = $dto->address;
        $company->save();
        return $company;
    }

    /**
     * Show new company
     * @param string $id
     * @return Company
     */
    public function v1CompanyShow(Company $company): Company
    {
        if(!$company) {
            throw new ModelNotFoundException('Company not found.');
        }
        return $company;
    }

    /**
     * Update new company
     * @param CompanyCreateDto $dto
     * @param string $id
     * @return Company
     */
    public function v1CompanyUpdate(CompanyCreateDto $dto, Company $company): Company
    {
        /**
         * @TODO
         * Logic here to upload file for avatar and cover
         */
        
        $company->avatar = $dto->avatar;
        $company->cover = $dto->cover;
        $company->name = $dto->name;
        $company->email = $dto->email;
        $company->tel = $dto->tel;
        $company->phone = $dto->phone;
        $company->address = $dto->address;
        $company->save();
        return $company;
    }

    /**
     * Show new company
     * @param string $id
     * @return Company
     */
    public function v1CompanyDelete(Company $company): Company
    {
        $company->delete();
        return $company;
    }
}
