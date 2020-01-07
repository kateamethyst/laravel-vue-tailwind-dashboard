<?php

declare(strict_types=1);

namespace App\Services\Factory;

use App\Services\Builder\QueryBuilder;
use App\Services\Factory\ListingPaginatorFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class FilterableListingPaginatorFactory extends ListingPaginatorFactory
{
    /**
     * @return $query
     */
    protected function getQuery()
    {
        $query = QueryBuilder::createFromRequest($this->model, $this->request, $this->filter);

        $query->with($this->processIncludes());

        return $query;
    }

    /**
     * @param object $query
     * @param integer $limit
     * 
     * @return LengthAwarePaginator
     */
    protected function paginate($query, int $limit = 25): LengthAwarePaginator
    {
        $paginator = parent::paginate($query, $limit);

        $ids = collect($paginator->items())->pluck('id');
        $existingModel = $this->model->select('id')->whereIn('id', $ids)->pluck('id');
        $nonExistingItems = $ids->diff($existingModel);

        if (!$nonExistingItems->isEmpty()) {
            $filteredItems = collect($paginator->items())->filter(static function (Model $item) use ($nonExistingItems) {
                return false === $nonExistingItems->contains($item->getKey());
            });

            $paginator = new Paginator(
                $filteredItems,
                $paginator->total(),
                $paginator->perPage(),
                $paginator->currentPage(),
                [
                    'path' => Paginator::resolveCurrentPath(),
                    'pageName' => 'page'
                ]
            );
        }
        
        return $paginator;
    }
}
