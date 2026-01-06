<?php 

namespace App\Domain\Chat\Entities;

enum ChatStatus: string
{
    case OPEN = 'O';
    case CLOSED = 'C';
    case ARCHIVED = 'A';
}
