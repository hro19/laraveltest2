<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{

  public function WorkItem1(){
    return 'sample一覧のタイトル';
  }

 //  public function WorkItem2(){
 //  	$all = Sample::all();

	// // $map=array_filter($all,function($x) {
	// //    return ($x);
	// // });

 //    return $map;
 //  }

}
