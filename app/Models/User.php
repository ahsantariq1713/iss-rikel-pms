<?php

namespace App\Models;

use App\Helpers\StringConvertor;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['email_verified_at' => 'datetime',];

    public const ADMIN_KEY = 'Administrator';
    public const TEAM_MEM_KEY = 'Relcoation Team Member';

    public function getimageTextAttribute()
    {
        return StringConvertor::Abbrv($this->name);
    }

    public function isAdmin()
    {
        return $this->role == User::ADMIN_KEY;
    }

    public function isTeamMember()
    {
        return $this->role == User::TEAM_MEM_KEY;
    }

    public function assignAdminRole()
    {
        $this->role = User::ADMIN_KEY;
    }

    public function assignTeamMemberRole()
    {
        $this->role = User::TEAM_MEM_KEY;
    }

    public function setPasswordHash($password)
    {
        $this->password = Hash::make($password);
    }

    public function passPasswordChallenge($password)
    {
        return Hash::check($password, $this->password);
    }

    public function failPasswordChallenge($password)
    {
        return !(Hash::check($password, $this->password));
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_member');
    }
}
