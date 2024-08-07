<?php

namespace App\Http\Controllers;

use App\Models\OtherApp;
use App\Repositories\EmployeeRepository;
use App\Repositories\PhraseRepository;
use App\Repositories\OtherAppRepository;
use App\Repositories\ArticleRepository;

class HomeController extends Controller
{

    protected $employeeRepository;
    protected $phraseRepository;
    protected $otherAppRepository;
    protected $articleRepository;

    public function __construct(
        EmployeeRepository $employeeRepository,
        PhraseRepository $phraseRepository,
        OtherAppRepository $otherAppRepository,
        ArticleRepository $articleRepository
    ) {
        // $this->middleware('auth');
        $this->employeeRepository = $employeeRepository;
        $this->phraseRepository = $phraseRepository;
        $this->otherAppRepository = $otherAppRepository;
        $this->articleRepository = $articleRepository;
    }


    public function index()
    {

        $otherApp = $this->otherAppRepository->getAllOtherApps();
        $birthdays = $this->employeeRepository->getEmployeesWithBirthdayThisMonth();
        $phrase = $this->phraseRepository->getRandomPhrase();



        return view('welcome', compact('otherApp', 'birthdays', 'phrase'));
    }

    public function history()
    {
        $history = $this->articleRepository->showArticlesBySectionName('historia');
        return view('site.about_us.history', compact('history'));

    }
}
