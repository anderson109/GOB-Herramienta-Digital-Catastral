<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Colonia;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;
use MoonShine\Metrics\ValueMetric;

/**
 * @extends ModelResource<Municipio>
 */
class MunicipioResource extends ModelResource
{
    protected string $model = Municipio::class;

    protected string $title = 'Municipios';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailModal = true;

    protected bool $withPolicy = true;

    public function redirectAfterSave(): string
    {
      $referer = Request::header('referer');
      return $referer ?: '/';
       // return '/admin/resource/municipio-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Municipio', 'name')->required()->showOnExport()->useOnImport(),
                BelongsTo::make('Departamento', 'departamentos', 'name')->showOnExport()->useOnImport(),
            ]),
        ];
    }

    public function filters(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Departamento', 'departamentos', 'name'),
            Text::make('Municipio', 'name'),
        ];
    }

    /**
     * @param Municipio $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    public function metrics(): array
    {
        $totalDepartamentos = Departamento::count();
        $totalMunicipios = Municipio::count();
        $totalColonias = Colonia::count();
       return[

        Grid::make([
            Column::make([
                ValueMetric::make('Nº de Departamentos')
            ->value($totalDepartamentos)
            ->icon('heroicons.user'),
            ])->columnSpan(4),
            
            Column::make([
                ValueMetric::make('Nº de Municipios')
            ->value($totalMunicipios)
            ->icon('heroicons.user'),
            ])->columnSpan(4),
            
            Column::make([
                ValueMetric::make('Nº de Colonias')
            ->value($totalColonias)
            ->icon('heroicons.user'),
            ])->columnSpan(4),

            ]),
      
       ];
    }
}
