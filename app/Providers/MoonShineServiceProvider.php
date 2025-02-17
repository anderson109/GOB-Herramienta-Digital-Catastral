<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ColoniaResource;
use App\MoonShine\Resources\CondicionesAmbientalesResource;
use App\MoonShine\Resources\DepartamentoResource;
use App\MoonShine\Resources\FisicoMaterialResource;
use App\MoonShine\Resources\MunicipioResource;
use App\MoonShine\Resources\SocioCulturalResource;
use App\MoonShine\Resources\SocioEconomicoResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    public function boot(): void
    {
        parent::boot();
    
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

                MenuItem::make('Clave Catastral', 'https://www.e.cnr.gob.sv/ClaveCatastral/')
                ->badge(fn() => 'Check')
                ->blank(),

                MenuItem::make('eCarto', 'https://mapa.elsalvadormaps.sv/cnr/map/4')
                ->badge(fn() => 'Check')
                ->blank(),


                MenuItem::make('Departamento', new DepartamentoResource)->icon('heroicons.map'),
                MenuItem::make('Municipio', new MunicipioResource)->icon('heroicons.home-modern'), 
                MenuItem::make('Distrito', new ColoniaResource)->icon('heroicons.map-pin'),
                MenuItem::make('Fisico Materiales', new FisicoMaterialResource)->icon('heroicons.flag'),
                MenuItem::make('Socio Economicos', new SocioEconomicoResource)->icon('heroicons.currency-dollar'),
                MenuItem::make('Socio Cultural', new SocioCulturalResource)->icon('heroicons.presentation-chart-line'),
                MenuItem::make('Riesgos Naturales', new CondicionesAmbientalesResource)->icon('heroicons.lifebuoy'),
                
        ];
    }

    

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
         return [
            'colors' => [
              'primary' => 'rgb(93, 173, 226)', // Azul suave y fresco
              'secondary' => 'rgb(255, 165, 0)', // Naranja cálido y brillante
             'body' => 'rgb(44, 62, 80)', // Gris claro y relajante
                'dark' => [
                    'DEFAULT' => 'rgb(30, 31, 67)',
                    50 => 'rgb(83, 103, 132)',
                    100 => 'rgb(179, 220, 255)',
                    200 => 'rgb(179, 220, 255)',
                    300 => 'rgb(53, 69, 103)',
                    400 => 'rgb(179, 220, 255)',
                    500 => 'rgb(41, 53, 82)',
                    600 => 'rgb(40, 51, 78)',
                    700 => 'rgb(39, 45, 69)',
                    800 => 'rgb(27, 37, 59)',
                    900 => 'rgb(15, 23, 42)',
                 
                    
                ],
 
                'success-bg' => 'rgb(0, 170, 0)',
                'success-text' => 'rgb(255,255, 255)',
                'warning-bg' => 'rgb(255, 220, 42)',
                'warning-text' => 'rgb(139, 116, 0)',
                'error-bg' => 'rgb(224, 45, 45)',
                'error-text' => 'rgb(255, 255, 255)',
                'info-bg' => 'rgb(0, 121, 255)',
                'info-text' => 'rgb(0, 0, 25)',
            ],
            'darkColors' => [
                'body' => 'rgb(27, 37, 59)',
                'success-bg' => 'rgb(17, 157, 17)',
                'success-text' => 'rgb(178, 255, 178)',
                'warning-bg' => 'rgb(225, 169, 0)',
                'warning-text' => 'rgb(255, 255, 199)',
                'error-bg' => 'rgb(190, 10, 10)',
                'error-text' => 'rgb(255, 197, 197)',
                'info-bg' => 'rgb(38, 93, 205)',
                'info-text' => 'rgb(179, 220, 255)',
            ]
        ];
    }
}



