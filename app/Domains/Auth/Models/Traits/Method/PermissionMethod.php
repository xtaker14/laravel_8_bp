<?php

namespace App\Domains\Auth\Models\Traits\Method;

use Illuminate\Support\Collection;

/**
 * Trait PermissionMethod.
 */
trait PermissionMethod
{  
    /**
     * @return Collection
     */ 
    public function getUnlimitedChildren(object $items): Collection 
    {
        $items_by_id = collect();

        foreach ($items as $item) {
            $items_by_id->put($item->id, $item);
        }

        foreach ($items as $key => $item) {
            $items_by_id->get($item->id)->children = new Collection;
            if ($item->parent_id != 0) {
                $items_by_id->get($item->parent_id)->children->push($item);
                unset($items[$key]);
            }
        }

        return $items;
    }
} 