<?php
require_once "vendor/autoload.php";

use Jenssegers\Model\Model;

class Wp_users extends Model {

	protected $table = 'wp_users';


    // protected $hidden = ['password'];

    // protected $guarded = ['password'];

    protected $casts = ['age' => 'integer'];

    // public function save()
    // {
    //     // return API::post('/items', $this->attributes);
    // }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = strtotime($value);
    }

    public function getBirthdayAttribute($value)
    {
        return new DateTime("@$value");
    }

    public function getAgeAttribute($value)
    {
        return $this->birthday->diff(new DateTime('now'))->y;
    }
}

$item = new Wp_users(array('name' => 'lifeifei'));
// $item->password = 'bar';
$item->email = 'myemail--org';
// $item->save();

// var_dump($item);

$allUsers = new Wp_users();
$allUsers->all();

// echo $item; // {"name":"john"}
