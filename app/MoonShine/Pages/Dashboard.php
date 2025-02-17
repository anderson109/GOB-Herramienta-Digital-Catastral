<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Colonia;
use App\Models\CondicionesAmbientales;
use App\Models\FisicoMaterial;
use App\Models\SocioCultural;
use App\Models\SocioEconomico;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Bienvenido al Panel catastral';
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

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [];
	}
}
