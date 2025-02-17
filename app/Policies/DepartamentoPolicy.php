<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Departamento;
use MoonShine\Models\MoonshineUser;

class DepartamentoPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, Departamento $item): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, Departamento $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, Departamento $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, Departamento $item): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user, Departamento $item): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
