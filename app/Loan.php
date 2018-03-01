<?php

namespace App;

use App\Interest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $fillable = ['date', 'name', 'id_no', 'spouse', 'spouse_id_no', 'cautioner', 'amount', 'agreement', 'receipt',
                            'comment', 'status', 'creater'];

    public static function create(array $params = [])
    {
        try {
            $date         = (string) Arr::get($params, 'date');
            $name         = (string) Arr::get($params, 'name');
            $id_no        = (string) Arr::get($params, 'id_no');
            $spouse       = (string) Arr::get($params, 'spouse');
            $spouse_id_no = (string) Arr::get($params, 'spouse_id_no');
            $cautioner    = (string) Arr::get($params, 'cautioner');
            $amount       = (string) Arr::get($params, 'amount');
            $agreement    = (string) Arr::get($params, 'agreement');
            $receipt      = (string) Arr::get($params, 'receipt');
            $comment      = (string) Arr::get($params, 'comment');

            if (empty($date) ||
            empty($name) ||
            empty($id_no) ||
            empty($spouse) ||
            empty($spouse_id_no) ||
            empty($cautioner) ||
            empty($amount) ||
            empty($agreement) ||
            empty($receipt)) {
                throw new \Exception('Invalid Parameter!');
            }

            $attributes = [];
            $attributes['date']         = $date;
            $attributes['name']         = $name;
            $attributes['id_no']        = $id_no;
            $attributes['spouse']       = $spouse;
            $attributes['spouse_id_no'] = $spouse_id_no;
            $attributes['cautioner']    = $cautioner;
            $attributes['amount']       = $amount;
            $attributes['agreement']    = $agreement;
            $attributes['receipt']      = $receipt;
            if (!empty($comment)) {
                $attributes['comment']  = $comment;
            }
            $attributes['status']       = 1;
            $attributes['creater']      = Auth::id();

            return static::query()->create($attributes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    public function repay(array $params = [])
    {
        try {
            $month        = (string) Arr::get($params, 'month');
            $amount       = (string) Arr::get($params, 'amount');
            $receipt      = (string) Arr::get($params, 'receipt');
            $comment      = (string) Arr::get($params, 'comment');

            if (empty($month) ||
            empty($amount) ||
            empty($receipt)) {
                throw new \Exception('Invalid Parameter!');
            }

            $interest = new Interest();
            $interest->month        = $month;
            $interest->amount       = $amount;
            $interest->receipt      = $receipt;
            if (!empty($comment)) {
                $interest->comment  = $comment;
            }
            $interest->creater      = Auth::id();
            $this->interests()->save($interest);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
