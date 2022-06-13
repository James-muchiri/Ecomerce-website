<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
//

protected $fillable = [

'names','phone_number','mode_of_delivery','location','cart', 'total','order_number','item_count','status','deliverly_status'

];
}
