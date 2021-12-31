<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserAclTrait
{
  public function permissions(): array
  {
    $permissionsPlan = $this->permissionsPlan();
    $permissionsRole = $this->permissionsRole();

    $permissions = [];
    foreach ($permissionsRole as $permission) {
      if (in_array($permission, $permissionsPlan))
        array_push($permissions, $permission);
    }

    return $permissions;
  }

  /**
   * Retorna as permissões 
   * do Teanant
   */
  public function permissionsPlan(): array
  {
    //recuperar o tenant
    //$tenant = $this->tenant()->first();
    //$plan = $tenant->plan;
    //$profiles = $plan->profiles;
    $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
    $plan = $tenant->plan;

    $permissions = [];
    foreach ($plan->profiles as $profile) {
      foreach ($profile->permissions as $permission) {
        array_push($permissions, $permission->name);
      }
    }

    return $permissions;
  }

  /**
   * Retorna as permissões 
   * dos Cargos
   */
  public function permissionsRole(): array
  {
    $roles = $this->roles()->with('permissions')->get();

    $permissions = [];
    foreach ($roles as $role) {
      foreach ($role->permissions as $permission) {
        array_push($permissions, $permission->name);
      }
    }

    return $permissions;
  }

  /**
   * Verifica se possui determinada permissão
   */
  public function hasPermission(string $permissionName): bool
  {
    return in_array($permissionName, $this->permissions());
  }

  /**
   * Verifica se usuário logado 
   * é um superusuário, que não precisa de 
   * respeitar as regras de ACL
   */
  public function isAdmin(): bool
  {
    return in_array($this->email, config('acl.admins'));
  }

  /**
   * Verifica se usuário logado 
   * é um superusuário, que não precisa de 
   * respeitar as regras de ACL
   */
  public function isTenant(): bool
  {
    return !in_array($this->email, config('acl.admins'));
  }
}
