<?php

declare(strict_types=1);

namespace App\Services\Factory;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListingPaginatorFactory
{
    /**
     * @var Model
     */
    protected $model;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    public $filter;

    /**
     * @param Model $model
     * @param Request $request
     * @param array $filter
     */
    public function __construct(Model $model, Request $request, array $filter = [])
    {
        $this->model = $model;
        $this->request = $request;
        $this->filter = $filter;
    }

    /**
     * @param Model $model
     * @param Request $request
     * @param array $filter
     * @param array $defaultOrderBy
     * @param object $query
     * 
     * @return self
     */
    public static function create(Model $model, Request $request, array $filter = [], array $defaultOrderBy = [], $query = null)
    {
        $paginatorFactory = new static($model, $request, $filter);

        if (!$query) {
            $query = $paginatorFactory->getQuery();
        }

        $query = $query->with($paginatorFactory->processIncludes());

        if ($request->get('order_by') || (!$request->get('filter') && !$request->get('q'))) {
            $query = $paginatorFactory->orderBy($query, $request->get('order_by', $defaultOrderBy));
        }

        return $paginatorFactory->paginate($query, (int) $request->get('limit', 10));
    }

    /**
     * @return array
     */
    protected function processIncludes(): array
    {
        $relations = [];

        foreach($this->request->get('includes', []) as $include) {
            $relationship = Str::camel($include);

            if (!method_exists($this->model, $relationship)) {
                continue;
            }

            $relations[] = $relationship;
        }

        return $relations;
    }

    /**
     * @return object $query
     */
    protected function getQuery()
    {
        $query = $this->model->newQuery();

        $query->with($this->processIncludes());

        $query = $query->where($this->filter);

        return $query;
    }

    /**
     * @param object $query
     * @param array $fields
     * 
     * @return object $query
     */
    protected function orderBy($query, array $fields)
    {
        foreach ($fields as $field => $direction)  {
            if (!in_array(strtolower($direction), ['asc', 'desc'], true)) {
                throw ErrorException::withCode('listing.invalidSortDirection', 422, 'Sort direction can be only asc or desc, ' . $direction . ' given');
            }

            $query->orderBy($field, $direction);
        }

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
        return $query->paginate($limit);
    }
}