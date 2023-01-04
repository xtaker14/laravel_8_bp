<?php

namespace App\Domains\Auth\Events\Categories;

use App\Domains\Auth\Models\Permission as Categories;
use Illuminate\Queue\SerializesModels;

/**
 * Class CategoriesCreated.
 */
class CategoriesCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $categories;

    /**
     * @param $categories
     */
    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }
}
