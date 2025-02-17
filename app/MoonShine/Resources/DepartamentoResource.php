<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Colonia;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Text;
use MoonShine\Metrics\ValueMetric;

/**
 * @extends ModelResource<Departamento>
 */
class DepartamentoResource extends ModelResource
{
    protected string $model = Departamento::class;

    protected string $title = 'Departamentos';
    
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
                Text::make('Departamento','name')->showOnExport()->useOnImport(),
            ]),
        ];
    }

    public function search(): array
    {
        return ['id','name'];
    }

    /**
     * @param Departamento $item
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
