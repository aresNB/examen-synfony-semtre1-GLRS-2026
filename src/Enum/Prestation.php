<?php

namespace App\Enum;

enum Prestation: string
{
    case CONSULTATION = 'consultation';
    case URGENCE = 'urgence';
    case CONTROLE = 'controle';
    case SUIVI = 'suivi';
}
