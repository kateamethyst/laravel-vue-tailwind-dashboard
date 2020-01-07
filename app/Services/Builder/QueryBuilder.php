<?php

declare(strict_types=1);

namespace App\Services\Builder;

use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

final class QueryBuilder
{
    public const OPERATOR_CONTAINS = 'contains';
    public const OPERATOR_NOT_CONTAINS = 'not_contains';
    public const OPERATOR_STARTS_WITH = 'starts_with';
    public const OPERATOR_NOT_STARTS_WITH = 'not_starts_with';
    public const OPERATOR_ENDS_WITH = 'ends_with';
    public const OPERATOR_NOT_ENDS_WITH = 'not_ends_with';
    public const OPERATOR_EQUALS = 'equals';
    public const OPERATOR_NOT_EQUALS = 'not_equals';
    public const OPERATOR_IN = 'in';
    public const OPERATOR_NOT_IN = 'not_in';
    public const OPERATOR_SMALLER_THAN = 'smaller_than';
    public const OPERATOR_SMALLER_THAN_OR_EQUAL = 'smaller_than_or_equal';
    public const OPERATOR_LARGER_THAN = 'larger_than';
    public const OPERATOR_LARGER_THAN_OR_EQUAL = 'larger_than_or_equal';
    public const OPERATOR_BETWEEN = 'between';
    public const OPERATOR_NOT_BETWEEN = 'not_between';

    private $model;

    private $queryString;

    private $filters;

    public function __construct(Model $model, string $queryString = null, array $filters = [])
    {
        $this->model = $model;
        $this->queryString = $this->escapeQueryString($queryString);
        $this->filters = collect($filters);
    }

    public static function createFromRequest($model, Request $request, array $filter = []): Builder
    {
        $queryBuilder = new static($model, $request->get('q'), $request->input('filter', $filter));

        return $queryBuilder->getBuilder();
    }

    public function getBuilder(): Builder
    {
        if ($this->queryString !== '*') {
            $this->queryString = '*' . $this->queryString . '*';
        }

        $builder = $this->model::query($this->queryString);

        return $this->processFilters($builder);
    }

    public function processFilters(Builder $builder): Builder
    {
        $this->filters->map(function ($operators, string $field) use ($builder) {
            if (!is_array($operators)) {
                $operators = [
                    'equals' => $operators
                ];
            }

            foreach ($operators as $operator => $value) {
                [$method, $arguments] = $this->getConstraintWithArguments($operator, $value);

                $builder->$method($field, ...$arguments);
            }
        });

        return $builder;
    }
    
    private function getConstraintWithArguments(string $operator, $value): array
    {
        if ($value === null) {
            throw new InvalidArgumentException('Value is null or empty');
        }

        if (
            in_array($operator, [
                static::OPERATOR_EQUALS,
                static::OPERATOR_NOT_EQUALS,
                static::OPERATOR_SMALLER_THAN,
                static::OPERATOR_SMALLER_THAN_OR_EQUAL,
                static::OPERATOR_LARGER_THAN,
                static::OPERATOR_LARGER_THAN_OR_EQUAL
            ], true)
        ) {
            if ($value !== null && is_scalar($value) === false) {
                throw new InvalidArgumentException(
                    'value for operator "' . $oprators . '" needs to be a scalar, ' . gettype($value) . ' given'
                );
            }

            $operatorSign = [
                static::OPERATOR_EQUALS => '=',
                static::OPERATOR_NOT_EQUALS => '!=',
                static::OPERATOR_SMALLER_THAN => '<',
                static::OPERATOR_SMALLER_THAN_OR_EQUAL => '<=',
                static::OPERATOR_LARGER_THAN => '>',
                static::OPERATOR_LARGER_THAN_OR_EQUAL => '>='
            ][$operator];

            return [
                'where',
                [
                    $operatorSign,
                    $value
                ]
            ];
        }

        if (
            in_array($operator, [
                static::OPERATOR_CONTAINS,
                static::OPERATOR_NOT_CONTAINS,
                static::OPERATOR_STARTS_WITH,
                static::OPERATOR_NOT_STARTS_WITH,
                static::OPERATOR_ENDS_WITH,
                static::OPERATOR_NOT_ENDS_WITH
            ], true)
        ) {
            if ($value !== null && is_scalar($value) === false) {
                throw new InvalidArgumentException(
                    'Value for operator "' . $operators . '" needs to be a scalar, ' . gettype($value) . ' given'
                );
            }

            $pattern = $this->getRegexPattern($operator);
            $value = sprintf($pattern, mb_strtolower($value));

            return [
                'where',
                [
                    'regexp',
                    $value
                ]
            ];
        }

        if (
            in_array($operator, [
                static::OPERATOR_IN,
                static::OPERATOR_NOT_IN
            ], true)
        ) {
            if (is_array($value) === false) {
                throw new InvalidArgumentException(
                    'Value for operator "' . $operator . '" needs to be an array, ' . gettype($value) . ' given'
                );
            }

            $method = $operator === static::OPERATOR_IN ? 'whereIn' : 'whereNotIn';

            return [
                $method,
                [
                    $value
                ]
            ];
        }

        if (
            in_array($operator, [
                static::OPERATOR_BETWEEN,
                static::OPERATOR_NOT_BETWEEN
            ], true)
        ) {
            if (is_array($value) === false || count($value) !== 2) {
                throw new InvalidArgumentException(
                    'Value for operator "' . $operator . '" needs to be an array with 2 values, ' . gettype($value) . ' given'
                );
            }

            $method = $operator === static::OPERATOR_BETWEEN ? 'whereBetween' : 'whereNotBetween';

            return [
                $method,
                [
                    $value
                ]
            ];
        }

        throw new InvalidArgumentException('Unknown operator "' . $operator . '"');
    }

    private function getRegexPattern(string $operator): string
    {
        switch ($operator) {
            case static::OPERATOR_CONTAINS:
                return '.*%s.*';

            case static::OPERATOR_NOT_CONTAINS:
                return '@&~(.*%s.*)';

            case static::OPERATOR_STARTS_WITH:
                return '%s.*';

            case static::OPERATOR_NOT_STARTS_WITH:
                return '@&~(%s.*)';

            case static::OPERATOR_ENDS_WITH:
                return '.*%s';

            case static::OPERATOR_NOT_ENDS_WITH:
                return '@&~(.*%s)';

            default:
                throw new InvalidArgumentException('Operator ' .$operator. ' does not have a regex pattern');
        }
    }

    private function escapeQueryString($queryString): string
    {
        if ($queryString === null) {
            return $this->queryString = '*';
        }

        $this->queryString = str_replace(['<', '>'], '', $queryString);
        $this->queryString = preg_replace(
            '/([' . preg_qoute('+-=!(){}[]^"~*?:\\/', '/') . '])/',
            '\\\\$1',
            $this->queryString
        );
        $this->queryString = str_replace(['&&', '||'], ['\&\&', '\|\|'], $this->queryString);

        return $this->queryString;
    }
}