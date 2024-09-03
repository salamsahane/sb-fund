<?php

namespace App\Enums;

enum CampaignStatus: string 
{
  case OPEN = 'Open';
  case COMPLETED = 'Completed';
}