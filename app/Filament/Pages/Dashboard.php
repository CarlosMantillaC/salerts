<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

class Dashboard extends BaseDashboard
{
    // Personaliza el número de columnas del grid de widgets (responsive)
    public function getHeaderWidgetsColumns(): int|array
    {
        return [
            'default' => 1,
            'md' => 2,
            'xl' => 3,
        ];
    }

    // Personaliza los widgets que aparecen en el dashboard
    public function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
            // Agrega aquí tus propios widgets
        ];
    }

    // Puedes agregar métodos adicionales para personalizar el diseño
}
