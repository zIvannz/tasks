<?php

namespace App\Enums;

enum Status: string {
    case NotStarted = 'not_started';
    case InProcess = 'in_process';
    case Completed = 'completed';
}
