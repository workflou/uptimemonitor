<?php

namespace App\Models;

use App\Observers\MonitorObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(MonitorObserver::class)]
class Monitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
