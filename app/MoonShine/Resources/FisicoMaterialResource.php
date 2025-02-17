<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Colonia;
use App\Models\CondicionesAmbientales;
use Illuminate\Database\Eloquent\Model;
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
 * @extends ModelResource<FisicoMaterial>
 */
class FisicoMaterialResource extends ModelResource
{
    protected string $model = FisicoMaterial::class;

    protected string $title = 'FisicoMaterials';

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
                BelongsTo::make('Colonia', 'colonias','name'),
                Text::make('extension Territorial','extensionTerritorial')->required()->showOnExport()->useOnImport(),
                Text::make('poblacion Estimada','poblacionEstimada')->required()->showOnExport()->useOnImport(),
                Text::make('numero De Viviendas','numeroDeViviendas')->required()->showOnExport()->useOnImport(),
                Text::make('promedio de Habitantes','promedioHabitantes')->required()->showOnExport()->useOnImport(),
                Text::make('numero de Habitantes','numeroHabitantes')->required()->showOnExport()->useOnImport(),
                Text::make('clasificacion Metropolitana','clasificacionMetropolitana')->required()->showOnExport()->useOnImport(),
                Text::make('materiales de Vivienda','materialesVivienda')->required()->showOnExport()->useOnImport(),
                Text::make('transporte Publico','transportePublico')->required()->showOnExport()->useOnImport(),
                Text::make('estado de Acceso Principal','estadoAccesoPrincipal')->required()->showOnExport()->useOnImport(),
                Text::make('agua Potable','aguaPotable')->required()->showOnExport()->useOnImport(),
                Text::make('energia electrica', 'energia')->required()->showOnExport()->useOnImport(),
                Text::make('alumbrado Publico','alumbradoPublico')->required()->showOnExport()->useOnImport(),
                Text::make('aguas Negras','aguasNegras')->required()->showOnExport()->useOnImport(),
                Text::make('aguas Lluvias','aguasLluvias')->required()->showOnExport()->useOnImport(),
                Text::make('tren de Aseo','trenAseo')->required()->showOnExport()->useOnImport(),
                Text::make('servicio Tren de Aseo','servicioTrenAseo')->required()->showOnExport()->useOnImport(),
            ]),
        ];
    }

    public function filters(): array
    {
        return [
            ID::make()->sortable(),
                BelongsTo::make('Colonia', 'colonias','name'),
                Text::make('extension Territorial','extensionTerritorial'),
                Text::make('poblacion Estimada','poblacionEstimada'),
                Text::make('numero De Viviendas','numeroDeViviendas'),
                Text::make('promedio de Habitantes','promedioHabitantes'),
                Text::make('numero de Habitantes','numeroHabitantes'),
                Text::make('clasificacion Metropolitana','clasificacionMetropolitana'),
                Text::make('materiales de Vivienda','materialesVivienda'),
                Text::make('transporte Publico','transportePublico'),
                Text::make('estado de Acceso Principal','estadoAccesoPrincipal'),
                Text::make('agua Potable','aguaPotable'),
                Text::make('energia electrica', 'energia'),
                Text::make('alumbrado Publico','alumbradoPublico'),
                Text::make('aguas Negras','aguasNegras'),
                Text::make('aguas Lluvias','aguasLluvias'),
                Text::make('tren de Aseo','trenAseo'),
                Text::make('servicio Tren de Aseo','servicioTrenAseo'),
        ];
    }
    
    /**
     * @param FisicoMaterial $item
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
                ValueMetric::make(' Nº de Condiciones Ambientales')
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
                ValueMetric::make('Nº de Socio Economicos ')
            ->value($totalSocioEconomico)
            ->icon('heroicons.user'),
            ])->columnSpan(3),

        ])
        
        ];
    }
}
