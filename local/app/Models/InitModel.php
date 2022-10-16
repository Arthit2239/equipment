<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InitModel extends Model
{
    public function newQuery($excludeDeleted = true)
    {
        if (request('withTrashed') == 'true') {
            return parent::newQuery()->withTrashed();
        } else if (request('onlyTrashed') == 'true') {
            if (request('onlyModel') == substr(strrchr(static::class, "\\"), 1)) {
                return parent::newQuery()->onlyTrashed();
            } else {
                return parent::newQuery();
            }
        } else {
            return parent::newQuery();
        }
    }
    public function scopesearch($sQuery,  $callback = false)
    {
        if ($callback != false) {
            $sQuery = $callback($sQuery);
        }

        if (request('Where') && $callback == false) {
            foreach (request('Where') as $sKey => $sValue) {
                if (isset($sValue)) {
                    if (strpos($sKey, '.')) {
                        list($sModel, $sField) = explode('.', $sKey);
                        $sQuery->whereHas($sModel, function ($query) use ($sField, $sValue) {
                            $query->where($sField, $sValue);
                        });
                    } else {
                        $sQuery->where($sKey, $sValue);
                    }
                }
            }
        }

        if (request('Like') && $callback == false) {
            foreach (request('Like') as $sKey => $sValue) {
                if ($sValue) {
                    if (strpos($sKey, '.')) {
                        list($sModel, $sField) = explode('.', $sKey);
                        $sQuery->whereHas($sModel, function ($query) use ($sField, $sValue) {
                            $query->where($sField, 'like', '%' . $sValue . '%');
                        });
                    } else {
                        $sQuery->where($sKey, 'like', '%' . $sValue . '%');
                    }
                }
            }
        }
        return $sQuery;
    }
}
