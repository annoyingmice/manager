<?php

namespace App\Services\API;

use App\Dto\API\RoleCreateDto;
use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait RoleTrait
{

    public function __initializeRole()
    {
    }

    /**
     * List new role
     * @return mixed
     */
    public function roles(?int $limit = 20): mixed
    {
        $roles = Role::paginate($limit);
        return $roles;
    }

    /**
     * Create new role
     * @param RoleCreateDto $dto
     * @return Role
     */
    public function roleCreate(RoleCreateDto $dto): Role
    {
        $role = new Role();
        $role->name = $dto->name;
        $role->owner = $dto->owner;
        $role->save();
        return $role;
    }

    /**
     * Update new role
     * @param RoleCreateDto $dto
     * @param string $id
     * @return Role
     */
    public function roleUpdate(RoleCreateDto $dto, Role $role): Role
    {
        $role->name = $dto->name;
        $role->owner = $dto->owner;
        $role->save();
        return $role;
    }

    /**
     * Show new role
     * @param string $id
     * @return Role
     */
    public function roleShow(Role $role): Role
    {
        return $role;
    }

    /**
     * Show new role
     * @param string $id
     * @return Role
     */
    public function roleDelete(Role $role): Role
    {
        $role->delete();
        return $role;
    }
}
