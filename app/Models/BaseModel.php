<?php
namespace App\Models;

class BaseModel extends \Eloquent
{

    /**
     * Get the format for database stored dates.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    /**
     * Convert a DateTime to a storable string.
     *
     * @param  \DateTime|int  $value
     * @return string
     */
    public function fromDateTime($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');
        $date .= "T";
        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');
        return $date;
    }

}
