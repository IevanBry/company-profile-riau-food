<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'location',
        'type',
        'description',
        'requirements',
        'responsibilities',
        'skills',
        'salary_range',
        'icon',
        'color',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Relasi ke applications
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    /**
     * Get pending applications
     */
    public function pendingApplications()
    {
        return $this->hasMany(JobApplication::class)->where('status', 'pending');
    }

    /**
     * Scope untuk job aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk job featured
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope untuk ordering
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Get route key name
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get type label
     */
    public function getTypeLabelAttribute()
    {
        $types = [
            'full_time' => 'Full Time',
            'part_time' => 'Part Time',
            'contract' => 'Contract',
            'internship' => 'Internship',
        ];
        return $types[$this->type] ?? $this->type;
    }

    /**
     * Auto generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = static::generateUniqueSlug($job->title);
            }
        });

        static::updating(function ($job) {
            if ($job->isDirty('title')) {
                $job->slug = static::generateUniqueSlug($job->title, $job->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::slugExists($slug, $ignoreId)) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    protected static function slugExists($slug, $ignoreId = null)
    {
        $query = static::where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        return $query->exists();
    }
}