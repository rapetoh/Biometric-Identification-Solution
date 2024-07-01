<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idAgent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'domicile',
        'telephone',
        'mail',
        'mdp',
        'isAdmin',
        'idCentre',
        'idRegion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mdp',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'isAdmin'=>'boolean'

    ];

    public function sessionsEnrolement()
    {
        return $this->hasMany(SessionEnrollement::class, 'idAgent', 'idAgent');
    }

    public function donneesDemographiques()
    {
        return $this->hasMany(DonneesDemographiques::class, 'idAgent', 'idAgent');
    }

    public function donneesBiometriques()
    {
        return $this->hasMany(DonneesBiometriques::class, 'idAgent', 'idAgent');
    }
    public function centreEnrolement(){
        return $this->belongsTo(CentreEnrolement::class, 'idCentre', 'idCentre');
    }

    public function region(){
        return $this->belongsTo(Region::class, 'idRegion','idRegion');
    }
    /**
     * Get the password for the agent.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mdp;
    }
}
