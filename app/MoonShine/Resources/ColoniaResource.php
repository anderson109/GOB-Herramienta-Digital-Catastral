<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colonia;
use App\Models\CondicionesAmbientales;
use App\Models\FisicoMaterial;
use App\Models\SocioCultural;
use App\Models\SocioEconomico;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Metrics\ValueMetric;

/**
 * @extends ModelResource<Colonia>
 */
class ColoniaResource extends ModelResource
{
    protected string $model = Colonia::class;

    protected string $title = 'Colonia';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    

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
                Text::make('Colonia','name')->required()->showOnExport()->useOnImport(),
                BelongsTo::make('Municipio', 'municipios', 'name')->showOnExport()->useOnImport(),
                Text::make('Codigo CNR','codigo')->required()->showOnExport()->useOnImport(),
                Text::make('Asentamiento Humano','asentamientoHumano')->required()->showOnExport()->useOnImport(),
             
            ]),
        ];
    }

   

    public function filters(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Colonia','name'),
            BelongsTo::make('Municipio', 'municipios', 'name'),
            Text::make('Codigo CNR','codigo'),
            Text::make('Asentamiento Humano','asentamientoHumano'),
        ];
    }


    /**
     * @param Colonia $item
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
        $totalColonias = Colonia::count();
        $totalCondicionesAmbientales = CondicionesAmbientales::count();
        $totalFisicoMaterial = FisicoMaterial::count();
        $totalSocioCultural = SocioCultural::count();
        $totalSocioEconomico = SocioEconomico::count();
        return[
            Grid::make([
            Column::make([
                ValueMetric::make('Nº de Colonias')
            ->value($totalColonias)
            ->icon('heroicons.user'),
            ])->columnSpan(3),
            
            Column::make([
                ValueMetric::make('Nº de Condiciones Ambientales')
                ->value($totalCondicionesAmbientales)
                ->icon('heroicons.user'),
            ])->columnSpan(3),
            
            Column::make([
                ValueMetric::make('Nº de Fisico Materiales')
                ->value($totalFisicoMaterial)
                ->icon('heroicons.user'),
            ])->columnSpan(3),

            Column::make([
                ValueMetric::make('Nº de Socio culturales')
                ->value($totalSocioCultural)
                ->icon('heroicons.user'),
            ])->columnSpan(3),
            Column::make([
                ValueMetric::make('Nº de Socio Economicos')
            ->value($totalSocioEconomico)
            ->icon('heroicons.user'),
            ])->columnSpan(3),

        ])
        
        ];
    }
   
}
