<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Services\TweetService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        //
        // $tweets=Tweet::all();
        // $tweets=Tweet::orderBy('created_at','DESC')->get();
        // dd($tweets);
        // return view('tweet.index',['name'=>'laravel']);

        // $tweetService=new TweetService();
        $tweets=$tweetService->getTweets();
        // dd($tweets);
        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dumpreport.'));
        return view('tweet.index')
        ->with('tweets',$tweets);
    }
}