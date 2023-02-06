<?php

namespace App\Models;

class Listings
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Description One'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Description Two'
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'Description Three'
            ],
        ];
    }

    public static function find($id)
    {
        $listings = self::all();
        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
