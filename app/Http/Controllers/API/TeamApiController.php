<?php
namespace App\Http\Controllers\API;



use App\Http\Controllers\Controller;
use App\Http\Resources\ApiTeamResource;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamApiController extends Controller // ichange class name to match file name
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Teams = Team::all();
        return response()->json(ApiTeamResource::collection($Teams));
    }
}



