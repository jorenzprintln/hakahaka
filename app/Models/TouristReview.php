<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristReview extends Model
{
    use HasFactory;

    protected $table = 'tourist_reviews'; // Specify the table name if it's not the plural form of the model name

    protected $fillable = [
        'business_name',
        'location',
        'reviewer_name',
        'review_content',
        'rating',
        'review_date',
        'source_platform',
        'source_url',
        'likes_count',
        'comments_count',
        'media_attached',
        'language',
        'sentiment',
        'keywords',
        'scraped_at',
    ];

    /**
     * Get the stars representation for the rating.
     *
     * @return string
     */
    public function getStarsAttribute()
    {
        // Assuming rating is out of 5
        $fullStars = floor($this->rating);
        $halfStar = ceil($this->rating) - $fullStars;
        $emptyStars = 5 - $fullStars - $halfStar;

        $stars = str_repeat('★', $fullStars);
        if ($halfStar) {
            $stars .= '☆'; // You can use a half-star character or just round
        }
        $stars .= str_repeat('☆', $emptyStars);

        return $stars;
    }
}