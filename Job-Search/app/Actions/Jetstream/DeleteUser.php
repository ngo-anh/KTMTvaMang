<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Log;

use Laravel\Jetstream\Contracts\DeletesUsers;
use App\Models\CurriculumVitae;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->delete();
    }
}
