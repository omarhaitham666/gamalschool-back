<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiAchievementsResource;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementApiController extends Controller // ichange class name to match file name
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Achievements = Achievement::all();
        return response()->json(ApiAchievementsResource::collection($Achievements));
    }
}




