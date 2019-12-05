<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{


	
	/**
     * The attributes that are mass assignable.
     *
     * @var string
     */
	//use Notifiable;

	protected $guard = "view_company";
	
	protected $table = 'view_company';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'language_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */	
	//use user id of admin
	protected $primaryKey = 'company_id';
	
	//public $table = true;
	
}
