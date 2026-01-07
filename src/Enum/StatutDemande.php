<?php

namespace App\Enum;

enum StatutDemande: string
{
    case EN_ATTENTE = 'en_attente';
    case VALIDEE = 'validee';
    case ANNULEE = 'annulee';
    case REFUSEE = 'refusee';
}
