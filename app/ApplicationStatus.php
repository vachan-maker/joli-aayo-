<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case APPLIED = 'applied';
    case INTERVIEW = 'interview';
    case REJECTED = 'rejected';
    case OFFER = 'offer';
    case ACCEPTED = 'accepted';

    case GF = 'gd';

    case TEST = 'test/aptitude';
}
