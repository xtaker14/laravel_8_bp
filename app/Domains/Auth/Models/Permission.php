<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Relationship\PermissionRelationship;
use App\Domains\Auth\Models\Traits\Method\PermissionMethod;
use App\Domains\Auth\Models\Traits\Scope\PermissionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission
{
    use HasFactory,
        PermissionMethod,
        PermissionRelationship,
        PermissionScope;

    protected $table = "permissions"; 
    protected $primaryKey = 'id';

    protected $fillable = [
        "type",
        "guard_name",
        "name",
        "description",
        "parent_id",
        "sort",
        "is_active",
        "is_editable",
        "is_menu",
        "is_parent_menu",
        "is_module",
        "module_name",
        "controller_name",
        "method_name",
        "menu_url",  
        "menu_route",  
        "updated_at",
    ];

    // protected static function newFactory()
    // {
    //     return PermissionFactory::new();
    // }
}
