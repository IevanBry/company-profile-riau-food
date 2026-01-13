<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'message',
        'cv_file',
        'status',
        'notes',
    ];

    /**
     * Relasi ke job
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Scope untuk status tertentu
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk pending
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending' => 'Menunggu Review',
            'reviewed' => 'Sudah Direview',
            'shortlisted' => 'Shortlist',
            'rejected' => 'Ditolak',
            'accepted' => 'Diterima',
        ];
        return $statuses[$this->status] ?? $this->status;
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute()
    {
        $colors = [
            'pending' => 'gray',
            'reviewed' => 'blue',
            'shortlisted' => 'yellow',
            'rejected' => 'red',
            'accepted' => 'green',
        ];
        return $colors[$this->status] ?? 'gray';
    }
}