<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Municipio;
use MoonShine\Models\MoonshineUser;

class MunicipioPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, Municipio $item): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, Municipio $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, Municipio $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, Municipio $item): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user, Municipio $item): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
