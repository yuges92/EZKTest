<?php

namespace App;

use App\Service\ConvertorInterface;
use App\Service\LocalConvertor;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'currency',
        'rate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $convertor;


    /**
     * Sets the convertor to be used
     * @param ConvertorInterface $convertor
     */
    public function setConvertor(ConvertorInterface $convertor):void
    {
        $this->convertor = $convertor;
    }


    /**
     * return converted value for a given currency type. Uses cuurent currency type and convert to given currency type.
     * If no convertor is set then it uses local convertor
     * @param String $currencyType
     * @return float
     */
    public function convert(String $currencyType)
    {
        if(!$this->convertor){
            $this->convertor= new LocalConvertor();
        }
        return $this->convertor->convert($this->currency,$currencyType, $this->rate);
    }
}
