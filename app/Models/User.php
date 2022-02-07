<?php

namespace App\Models;

use App\Mail\Representatives\ShopApprovedMail;
use App\Mail\Users\UserAuthorizedMail;
use App\Mail\Users\UserCreatedMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'authorized',
        'picture_profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
    }

    public function isRoleRepresentative()
    {
        return !is_null($this->role_id) && $this->role_id == Role::REPRESENTATIVE;
    }

    public function isAdmin()
    {
        return $this->role_id == Role::ADMINISTRATOR;
    }

    public function addPictureProfile(UploadedFile $picture): void
    {
        $destinationFolder = 'representatives';

        $relativePath = $picture->store($destinationFolder, 'public');

        $this->picture_profile = '/storage/' . $relativePath;
    }

    public function scopeNotificationAuthorized(): void
    {
        $users = User::where('role_id', Role::ADMINISTRATOR)->get();

        foreach ($users as $user) {

            Mail::to($user->email)->send(new UserAuthorizedMail());
        }
    }

    public function scopeNotificationShopApproved(): void
    {
        $users = User::where('role_id', Role::ADMINISTRATOR)->get();

        foreach ($users as $user) {

            Mail::to($user->email)->send(new ShopApprovedMail());
        }
    }

    public function scopeNotificationCreated(): void
    {
        $users = User::where('role_id', Role::ADMINISTRATOR)->get();

        foreach ($users as $user) {

            Mail::to($user->email)->send(new UserCreatedMail());
        }
    }
}
