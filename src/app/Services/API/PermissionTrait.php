<?php

namespace App\Services\API;

use App\Dto\API\PermissionCreateDto;
use App\Models\Permission;

trait PermissionTrait
{

    public function __initializePermission()
    {
    }

    /**
     * List new role
     * @return mixed
     */
    public function permissions(?int $limit = 20): mixed
    {
        $permissions = Permission::paginate($limit);
        return $permissions;
    }

    /**
     * Create new permission
     * @param PermissionCreateDto $dto
     * @return Permission
     */
    public function permissionCreate(PermissionCreateDto $dto): Permission
    {
        $permission = new Permission();
        $permission->name = $dto->name;
        $permission->owner = $dto->owner;
        $permission->save();
        return $permission;
    }

    /**
     * Update new role
     * @param PermissionCreateDto $dto
     * @param string $id
     * @return Role
     */
    public function permissionUpdate(PermissionCreateDto $dto, Permission $permission): Permission
    {
        $permission->name = $dto->name;
        $permission->owner = $dto->owner;
        $permission->save();
        return $permission;
    }

    /**
     * Show new permission
     * @param string $id
     * @return Permission
     */
    public function permissionShow(Permission $permission): Permission
    {
        return $permission;
    }

    /**
     * Show new permission
     * @param string $id
     * @return Permission
     */
    public function permissionDelete(Permission $permission): Permission
    {
        $permission->delete();
        return $permission;
    }
}
