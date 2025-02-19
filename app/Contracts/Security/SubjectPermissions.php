<?php

namespace App\Contracts\Security;

interface SubjectPermissions
{
    public const VIEW_SUBJECT = 'view_subject';

    public const SHOW_SUBJECT = 'show_subject';

    public const CREATE_SUBJECT = 'create_subject';

    public const UPDATE_SUBJECT = 'update_subject';

    public const DELETE_SUBJECT = 'delete_subject';

    public const RESTORE_SUBJECT = 'restore_subject';

    public const ASSIGN_SUBJECT = 'assign_subject';
}
