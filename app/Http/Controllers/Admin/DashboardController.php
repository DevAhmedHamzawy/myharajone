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
        /*$estatesByAdSortInMonths = [];

        for($i = 1; $i < 9; $i++){
            $estatesByAdSortInMonths[$i] = [];
            for($j = 1; $j < 13; $j++){
                array_push($estatesByAdSortInMonths[$i],Estate::FindByMonth($j, $i));
            }
        }
         
       
        $estateAddingByMonth = new EstateAddingByMonth;
        $estateAddingByMonth->labels = ($this->monthLabels);
        for($i = 1; $i < 9; $i++){
            $estateAddingByMonth->dataset($this->adSortLabels[$i], 'line', $estatesByAdSortInMonths[$i]);
        }



        

        $usersByMonth = new UsersByMonth;
        $usersByMonth->labels = ($this->monthLabels);

        $usersInMonth = [];
        for($j = 1; $j < 13; $j++){
            array_push($usersInMonth,User::FindUsersByMonth($j));
        }

        $usersByMonth->dataset('My dataset', 'line', $usersInMonth);
        $usersByMonth->height(200);
        $usersByMonth->displayAxes(false);
        $usersByMonth->displayLegend(false);

        

        $officesByMonth = new OfficesByMonth;
        $officesByMonth->labels = ($this->monthLabels);

        $officesInMonth = [];
        for($j = 1; $j < 13; $j++){
            array_push($officesInMonth,User::FindOfficesByMonth($j));
        }

        $officesByMonth->dataset('My dataset', 'line', $officesInMonth);
        $officesByMonth->height(200);
        $officesByMonth->displayAxes(false);
        $officesByMonth->displayLegend(false);





        $lawyersByMonth = new LawyersByMonth;
        $lawyersByMonth->labels = ($this->monthLabels);

        $lawyersInMonth = [];
        for($j = 1; $j < 13; $j++){
            array_push($lawyersInMonth,User::FindLawyersByMonth($j));
        }

        $lawyersByMonth->dataset('My dataset', 'line', $lawyersInMonth);
        $lawyersByMonth->height(200);
        $lawyersByMonth->displayAxes(false);
        $lawyersByMonth->displayLegend(false);


        $countUsers = User::CountUsers();
        $countOffices = User::CountOffices();
        $countLawyers = User::CountLawyers();
        $countEstates = Estate::count();



        $countPremiums = Estate::CountPremiums();
       
        $countPremiumChart = new CountPremiumChart;
        $countPremiumChart->labels = array_keys($countPremiums);
        $resultCountPremiums = array_values($countPremiums);
        $countPremiumChart->dataset('الإعلانات المثبتة', 'bar', $resultCountPremiums);


        $countDurations = Estate::CountDurations();

        $countDurationChart = new CountDurationChart;
        $countDurationChart->labels = array_keys($countDurations);
        $resultCountDurations = array_values($countDurations);
        $countDurationChart->dataset('عدد الإعلانات', 'bar', $resultCountDurations);


        $countOffers = Estate::CountOffers();

        $countOfferChart = new CountOfferChart;
        $countOfferChart->labels = array_keys($countOffers);
        $resultCountOffers = array_values($countOffers);
        $countOfferChart->dataset('My dataset', 'pie', $resultCountOffers);
        $countOfferChart->minimalist(false);
        $countOfferChart->displayAxes(false);


        $countSorts = Estate::CountSorts();

        $countSortChart = new CountSortChart;
        $countSortChart->labels = array_keys($countSorts);
        $resultCountSorts = array_values($countSorts);
        $countSortChart->dataset('My dataset', 'doughnut', $resultCountSorts);
        $countSortChart->minimalist(false);
        $countSortChart->displayAxes(false);

        $countAdSorts = Estate::CountAdSorts();

        $countAdSortChart = new CountAdSortChart;
        $countAdSortChart->labels = array_keys($countAdSorts);
        $resultCountAdSorts = array_values($countAdSorts);
        $countAdSortChart->dataset('My dataset', 'pie', $resultCountAdSorts);
        $countAdSortChart->minimalist(false);
        $countAdSortChart->displayAxes(false);

        $countCategories = Estate::CountCategories();

        $countCategoryChart = new CountCategoryChart;
        $countCategoryChart->labels = array_keys($countCategories);
        $resultCountCategories = array_values($countCategories);
        $countCategoryChart->dataset('My dataset', 'doughnut', $resultCountCategories);
        $countCategoryChart->minimalist(false);
        $countCategoryChart->displayAxes(false);



        $topFiveUsers = User::TopFiveUserEstates();
        $topFiveUserNames = [];
        $topFiveUserEstates = [];
        foreach ($topFiveUsers as $user) {
            array_push($topFiveUserNames, $user->name);
            array_push($topFiveUserEstates, $user->estates_count);
        }

        $topFiveUsersChart = new TopFiveUsersChart;
        $topFiveUsersChart->labels = $topFiveUserNames;
        $topFiveUsersChart->dataset('My dataset', 'pie', $topFiveUserEstates);
        $topFiveUsersChart->minimalist(false);
        $topFiveUsersChart->displayAxes(false);

        $now = Carbon::now();
        $dt = Carbon::createFromFormat('m', $now->month);
        
        
        $countVisitors = Visitor::count();
        $countClicks = floor(Visitor::clicks()/2);
        $allVisitors = Visitor::all();
        

        return view('admin.dashboard', compact('estateAddingByMonth', 'usersByMonth', 'officesByMonth', 'lawyersByMonth', 'countUsers', 'countOffices', 'countLawyers', 'countEstates', 'countPremiumChart', 'countDurationChart', 'countOfferChart' , 'countSortChart' , 'countAdSortChart' , 'countCategoryChart', 'topFiveUsersChart', 'countVisitors', 'countClicks', 'allVisitors'));*/



        $countCategories = Post::CountCategories();

        $countCategoryChart = new CountCategoryChart;
        $countCategoryChart->labels = array_keys($countCategories);
        $resultCountCategories = array_values($countCategories);
        $countCategoryChart->dataset('My dataset', 'doughnut', $resultCountCategories);
        $countCategoryChart->minimalist(false);
        $countCategoryChart->displayAxes(false);

        $bestSellers = User::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderBy('likes_count')->orderBy('favourites_count')->take(5)->get();
      
        $mostReportedSellers = User::withCount(['likes', 'favourites', 'dislikes', 'reports'])->orderByDesc('reports_count')->take(5)->get();


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

        for($i = 0; $i < 4; $i++){
            $PostsBySortInYear[$i] = [];
            for($j = 1; $j < 13; $j++){
                array_push($PostsBySortInYear[$i],Post::FindByMonth($j, $i));
            }
        }
         
       
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