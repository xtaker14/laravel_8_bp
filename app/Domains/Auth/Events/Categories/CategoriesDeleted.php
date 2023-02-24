<?php

namespace App\Domains\Auth\Events\Categories;

use App\Domains\Auth\Models\Permission as AdmCategories;
use Illuminate\Queue\SerializesModels;

/**
 * Class CategoriesDeleted.
 */
class CategoriesDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $categories;

    /**
     * @param $categories
     */
    public function __construct(AdmCategories $categories)
    {
        $this->categories = $categories;
    }
}
