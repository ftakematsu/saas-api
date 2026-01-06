<?php 

namespace App\Domain\Chat\Entities;

enum ChatType: string
{
    case PRIVATE = 'PR';
    case GROUP = 'GR';
    case SUPPORT = 'SU';
    case SYSTEM = 'SY';
}
