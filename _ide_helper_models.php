<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $source_name
 * @property numeric $amount
 * @property string $start_date
 * @property string $end_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereSourceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Budget whereUpdatedAt($value)
 */
	class Budget extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $menu_id
 * @property int $total_porsi
 * @property numeric $total_estimated_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereTotalEstimatedCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereTotalPorsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DistributionLog whereUpdatedAt($value)
 */
	class DistributionLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $budget_id
 * @property int $menu_id
 * @property string $date
 * @property int $portion_count
 * @property numeric $cost_per_portion
 * @property numeric $total_cost
 * @property string $location
 * @property string|null $photo
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Budget $budget
 * @property-read \App\Models\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereBudgetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereCostPerPortion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure wherePortionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereTotalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expenditure whereUpdatedAt($value)
 */
	class Expenditure extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property float $energy
 * @property float $protein
 * @property float $fat
 * @property float $carbohydrate
 * @property float $iron
 * @property float $sodium
 * @property float $fiber
 * @property float $calcium
 * @property float $potassium
 * @property float $price_per_kg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Inventory|null $inventory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Menu> $menus
 * @property-read int|null $menus_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereCalcium($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereCarbohydrate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereFat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereFiber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereIron($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient wherePotassium($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient wherePricePerKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereSodium($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ingredient whereUpdatedAt($value)
 */
	class Ingredient extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $ingredient_id
 * @property numeric $stock_kg
 * @property numeric $min_stock_kg
 * @property string $warehouse_location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ingredient $ingredient
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereIngredientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereMinStockKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereStockKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Inventory whereWarehouseLocation($value)
 */
	class Inventory extends \Eloquent {}
}

namespace App\Models{
/**
 * @method bool|null delete()
 * @method static int count(mixed $columns = '*')
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property float $calories
 * @property float $estimated_cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ingredient> $ingredients
 * @property-read int|null $ingredients_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCalories($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereEstimatedCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PurchaseLog query()
 */
	class PurchaseLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

