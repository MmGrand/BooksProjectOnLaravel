<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const DESCRIPTION = 'description';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::DESCRIPTION => [$this, 'description'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

}
