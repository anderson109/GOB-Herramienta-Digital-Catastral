<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\CondicionesAmbientales;
use MoonShine\Models\MoonshineUser;

class CondicionesAmbientalesPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, CondicionesAmbientales $item): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, CondicionesAmbientales $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, CondicionesAmbientales $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, CondicionesAmbientales $item): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user, CondicionesAmbientales $item): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
