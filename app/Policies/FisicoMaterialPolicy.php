<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\FisicoMaterial;
use MoonShine\Models\MoonshineUser;

class FisicoMaterialPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, FisicoMaterial $item): bool
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user, FisicoMaterial $item): bool
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user, FisicoMaterial $item): bool
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user, FisicoMaterial $item): bool
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user, FisicoMaterial $item): bool
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return $user->isSuperUser();
    }
}
