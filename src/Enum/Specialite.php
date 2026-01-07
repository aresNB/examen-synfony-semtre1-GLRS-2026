<?php

namespace App\Enum;

enum Specialite: string
{
    case GENERALISTE = 'generaliste';
    case CARDIOLOGIE = 'cardiologie';
    case DERMATOLOGIE = 'dermatologie';
    case PEDIATRIE = 'pediatrie';
    case GYNECOLOGIE = 'gynecologie';
}
