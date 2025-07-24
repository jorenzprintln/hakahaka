<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\TouristReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ResortController extends Controller
{
    public function showPortRoyale()
    {
        // Fetch all reviews for 'Port Royale' (or paginate if desired, but for stats, usually all relevant data)
        // For statistics, we'll fetch all reviews related to 'Port Royale'
        $allReviews = TouristReview::where('business_name', 'Port Royale')
            ->orderBy('review_date', 'desc')
            ->get();

        // --- Calculate Statistics ---
        $totalReviews = $allReviews->count();
        $averageRating = $allReviews->avg('rating');
        $mediaAttachedCount = $allReviews->where('media_attached', 1)->count();
        $reviewsWithMediaPercentage = $totalReviews > 0 ? round(($mediaAttachedCount / $totalReviews) * 100, 2) : 0;

        // Rating Distribution
        $ratingDistribution = $allReviews->groupBy('rating')
            ->map(fn($group) => $group->count())
            ->sortKeys()
            ->toArray();
        // Ensure all ratings from 1 to 5 are present, even if count is 0
        $fullRatingDistribution = [];
        for ($i = 1; $i <= 5; $i += 0.5) { // Assuming ratings can be .5 increments
            $fullRatingDistribution[(string) $i] = $ratingDistribution[(string) $i] ?? 0;
        }


        // Reviews by Source Platform
        $reviewsByPlatform = $allReviews->groupBy('source_platform')
            ->map(fn($group) => $group->count())
            ->toArray();

        // Reviews by Sentiment
        $reviewsBySentiment = $allReviews->groupBy('sentiment')
            ->map(fn($group) => $group->count())
            ->toArray();
        // Ensure common sentiments are present
        $fullSentimentDistribution = [
            'positive' => $reviewsBySentiment['positive'] ?? 0,
            'neutral' => $reviewsBySentiment['neutral'] ?? 0,
            'negative' => $reviewsBySentiment['negative'] ?? 0,
            'mixed' => $reviewsBySentiment['mixed'] ?? 0, // Assuming 'mixed' is also a possibility
        ];


        // Reviews Over Time (Monthly) for SQLite
        // Using strftime for SQLite to group by year-month
        $reviewsOverTime = TouristReview::where('business_name', 'Port Royale')
            ->select(
                DB::raw('strftime("%Y-%m", review_date) as month'),
                DB::raw('count(*) as count')
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->month => $item->count];
            })
            ->toArray();

        // --- Areas for Improvement (keywords from negative/mixed reviews) ---
        $negativeAndMixedReviews = TouristReview::where('business_name', 'Port Royale')
            ->whereIn('sentiment', ['negative', 'mixed'])
            ->whereNotNull('keywords') // Ensure keywords are not null
            ->get();

        $improvementKeywords = [];
        foreach ($negativeAndMixedReviews as $review) {
            // Split keywords string by comma and trim whitespace
            $keywords = array_map('trim', explode(',', $review->keywords));
            foreach ($keywords as $keyword) {
                // Normalize keyword (e.g., lowercase) and count occurrences
                $normalizedKeyword = strtolower($keyword);
                if (!empty($normalizedKeyword)) { // Ensure keyword is not empty
                    $improvementKeywords[$normalizedKeyword] = ($improvementKeywords[$normalizedKeyword] ?? 0) + 1;
                }
            }
        }

        // Sort keywords by frequency (most frequent first) and take the top N (e.g., 5-7)
        arsort($improvementKeywords);
        // Take top 7 and crucially, pass the array with counts, not just keys
        $topImprovementAreasWithCounts = array_slice($improvementKeywords, 0, 7, true); // `true` preserves the keys (the keywords)

        // If no keywords found, provide a fallback message for the view
        if (empty($topImprovementAreasWithCounts)) {
            $topImprovementAreasWithCounts = ['no specific areas identified yet' => 0]; // A dummy entry for the @forelse loop
        }


        // Pass all data to the view
        return view('portroyale', compact(
            'allReviews',
            'totalReviews',
            'averageRating',
            'reviewsWithMediaPercentage',
            'fullRatingDistribution',
            'reviewsByPlatform',
            'fullSentimentDistribution',
            'reviewsOverTime',
            'topImprovementAreasWithCounts' // NEW: Pass the areas for improvement WITH their counts
        ));
    }
    public function summarizeReviews(Request $request)
{
    // Get only reviews for "Port Royale"
    $reviews = TouristReview::where('business_name', 'Port Royale')
        ->pluck('review_content')
        ->toArray();

    $combinedFeedback = implode(' ', $reviews);

    if (empty($combinedFeedback)) {
        return response()->json(['error' => 'No feedback found.'], 400);
    }

    try {
        $response = Http::asForm()->post('http://192.168.1.161:5000/summarize', [
            'summarize' => $combinedFeedback
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Flask API Error'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function showReviews()
{
    $reviews = Review::all();

    foreach ($reviews as $review) {
        if ($review->review_content) {
            try {
                $response = Http::asForm()->post('http://192.168.1.161:5000/sentiment', [
                    'user_feedback' => $review->review_content
                ]);

                $result = $response->json();

                $review->sentiment = $result['sentiment'] ?? 'neutral';
            } catch (\Exception $e) {
                $review->sentiment = 'neutral';
            }
        } else {
            $review->sentiment = 'neutral';
        }
    }

    return view('your-view-file', ['allReviews' => $reviews]);
}


}