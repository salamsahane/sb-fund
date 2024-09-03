<?php

namespace App\Models;

use App\Enums\CampaignStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'goal_amount', 
        'image', 
        'user_id', 
        'category_id', 
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function checkCampaignStatus(): void
    {
        $totalDonations = $this->donations()->sum('amount');
        
        if ($totalDonations < $this->goal_amount) return;

        $this->status = CampaignStatus::COMPLETED->value;
        $this->save();
    }

}
