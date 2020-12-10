<?php

namespace App\Http\Controllers\Admin;

use App\Charts\CountCategoryChart;
use App\Charts\PostsByMonthChart;
use App\Charts\PostsInYearChart;
use App\Comment;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Review;
use App\User;

class DashboardController extends Controller
{
    protected $monthLabels;
    protected $sortLabels;

    public function __construct()
    {
        $this->monthLabels =  ['يناير', 'فبراير', 'مارس', 'إبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'];
        $this->sortLabels = ['حراج العقار' ,  'حراج السيارات' , 'حراج الأجهزة' , 'كل الحراج'];
    }

    public function index()
    {
       
        $countCategories = Post::CountCategories();

        $countCategoryChart = new CountCategoryChart;
        $countCategoryChart->labels = array_keys($countCategories);
        $resultCountCategories = array_values($countCategories);
        $countCategoryChart->dataset('My dataset', 'doughnut', $resultCountCategories);
        $countCategoryChart->minimalist(false);
        $countCategoryChart->displayAxes(false);

        $bestSellers = User::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderBy('likes_count')->orderBy('favourites_count')->take(5)->get();
      
        $mostReportedSellers = User::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderByDesc('reports_count')->take(6)->get();


        $postsByMonth = new PostsByMonthChart;
        $postsByMonth->labels = ($this->sortLabels);

        $postsInMonth = [];
        for($j = 0; $j < 4; $j++){
            array_push($postsInMonth,Post::FindPostsByMonth($this->sortLabels[$j], now()->month));
        }

        $postsByMonth->dataset('My dataset', 'line', $postsInMonth);
        $postsByMonth->height(200);
        //$postsByMonth->displayAxes(false);
        //$postsByMonth->displayLegend(false);

        $postsCount = Post::count();
        $usersCount = User::count();
        $contactsCount = Contact::count();
        $commentsCount = Comment::count();


        $bestPosts = Post::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderBy('likes_count')->orderBy('favourites_count')->get();


        $categoryAdsCount = [];
        
        for ($i=0; $i < 4; $i++) { 
            array_push($categoryAdsCount, Post::countCategoryAds($this->sortLabels[$i]));
        }


        $mostReportedPosts = Post::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderByDesc('reports_count')->take(20)->get();

        //most user adding (eloquent relationship)
        $mostSellersPosts = User::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderByDesc('reports_count')->take(20)->get();


        $mostViewedEstatePosts = 5;

        $mostViewedCarPosts = 5;


        $PostsBySortInYear = [];

        //for($i = 0; $i < 4; $i++){
            //$PostsBySortInYear[$i] = [];
            for($j = 1; $j < 13; $j++){
                array_push($PostsBySortInYear,Post::FindPostsByMonth($i, $j));
            }
        //}
         
       //dd($PostsBySortInYear);
       
        $postsAddingInYear = new PostsInYearChart;
        $postsAddingInYear->labels = ($this->monthLabels);
        for($i = 0; $i < 4; $i++){
            $postsAddingInYear->dataset($this->sortLabels[$i], 'line', $PostsBySortInYear);
        }


        $lastComments = Comment::latest()->take(10)->get();
        $lastReviews = Review::latest()->take(10)->get();


        return view('admin.dashboard', compact('countCategoryChart', 'bestSellers' , 'mostReportedSellers' , 'postsByMonth' , 'postsCount' , 'usersCount', 'commentsCount', 'contactsCount' , 'mostReportedPosts' , 'mostSellersPosts' , 'postsAddingInYear', 'lastComments' , 'lastReviews'));



    }
}