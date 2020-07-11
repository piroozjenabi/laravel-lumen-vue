<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Uniq extends Model
{

    protected $guarded = [];
    public $timestamps = false;

    /**
     * generate random uniq numbrs
     *
     * @param int $count count of generate randdom uniq numbers
     * @return array
     */
    public static function generateUniq($count)
    {
        $i = 0;
        $uniqNumebrs = [];
        while ($i < $count) {
            $uniq = random_int(1000000, 9999999);
            if (!self::where('uniq_id')->exists()) {
                $uniqNumebrs[] = [ 'uniq_id' => $uniq];
                $i++;
            }
        }
        self::insert($uniqNumebrs);
        return count($uniqNumebrs) > 0
        ? [true, count($uniqNumebrs) . " unique number generated", $uniqNumebrs]
        : [false, " 0 unique number generated.", []];
    }
}
