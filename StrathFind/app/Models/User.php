<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationship: User belongs to a Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relationship: User has many lost items they found
    public function foundItems()
    {
        return $this->hasMany(LostItem::class, 'finder');
    }

    // Relationship: User has many claims
    public function claims()
    {
        return $this->hasMany(Claim::class, 'claimer_id');
    }

    // Authorization helper methods
    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    public function isStudent()
    {
        return $this->role->name === 'student';
    }

    public function isStaff()
    {
        return $this->role->name === 'staff';
    }
}