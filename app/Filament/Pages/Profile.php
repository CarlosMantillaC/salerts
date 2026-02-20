<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.profile';

    protected static ?string $title = 'Perfil';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getUserMenuItems(): array
    {
        return [
            [
                'label' => 'Perfil',
                'url' => static::getUrl(),
                'icon' => 'heroicon-o-user',
            ],
        ];
    }

    public function getUser()
    {
        return Auth::user();
    }
}
