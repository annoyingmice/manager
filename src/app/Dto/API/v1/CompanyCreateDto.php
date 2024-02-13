<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\CompanyCreateRequest;
use Illuminate\Support\Facades\File;

class CompanyCreateDto
{
    public function __construct(
        readonly ?File $avatar,
        readonly ?File $cover,
        readonly string $name,
        readonly string $email,
        readonly string $tel,
        readonly string $phone,
        readonly string $address
    ) {
    }

    /**
     * Serialize request
     * @param CompanyCreateRequest $request
     * @return CompanyCreateDto
     */
    public static function fromRequest(CompanyCreateRequest $request): CompanyCreateDto
    {
        return new self(
            avatar: $request->validated('avatar'),
            cover: $request->validated('cover'),
            name: $request->validated('name'),
            email: $request->validated('email'),
            tel: $request->validated('tel'),
            phone: $request->validated('phone'),
            address: $request->validated('address'),
        );
    }
}
