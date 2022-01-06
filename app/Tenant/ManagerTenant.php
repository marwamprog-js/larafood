<?php

namespace App\Tenant;

use App\Models\Tenant;
use phpDocumentor\Reflection\Types\Boolean;

class ManagerTenant
{

  /**
   * GET Id TEANANT
   */
  public function getTenantIdentify()
  {
    return auth()->check() ? auth()->user()->tenant_id : '';
  }


  /**
   * GET TENANT
   */
  public function getTenant()
  {
    return auth()->check() ? auth()->user()->tenant : '';
  }

  /**
   * Verifica se o USUARIO LOGADO 
   * é um super admin
   */
  public function isAdmin(): bool
  {
    return in_array(auth()->user()->email, config('tenant.admins'));
  }
}
