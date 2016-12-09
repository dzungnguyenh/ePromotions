<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

  protected $table = 'roles';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['role'];

  /**
   * Get the users for role
   *
   * @return User Information of users
   */
  public function users()
  {
      return $this->hasMany(User::class);
  }

}
