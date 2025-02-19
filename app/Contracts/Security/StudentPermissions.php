<?php

namespace App\Contracts\Security;

interface StudentPermissions
{
    public const VIEW_STUDENT = 'view_student';

    public const SHOW_STUDENT = 'show_student';

    public const CREATE_STUDENT = 'create_student';

    public const UPDATE_STUDENT = 'update_student';

    public const DELETE_STUDENT = 'delete_student';

    public const RESTORE_STUDENT = 'restore_student';
}
