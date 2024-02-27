<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\AAnnouncements;

class AAnnouncementsController extends Controller
{
    public function addAnnouncement(Request $request) {
        try {
            AAnnouncements::create([
                'title' => $request->input('title'),
                'subject' => $request->input('subject'),
                'content' => $request->input('body'),
            ]);

            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function a_announcement() {
        $announcements = AAnnouncements::all();

        return view('admin.announcement')->with('announcements', $announcements);
    }
}