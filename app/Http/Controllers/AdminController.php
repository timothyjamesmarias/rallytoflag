<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index()
  {
    return inertia('Admin/Index');
  }

  public function users()
  {
    return inertia('Admin/Users', [
      'users' => User::query()
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString()
    ]);
  }
  public function events()
  {
    return inertia('Admin/Events', [
      'events' => Event::query()
        ->addSelect(['image' => EventImage::select('path')
          ->whereColumn('event_id', 'events.id')
          ->limit(1)
        ])
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString()
    ]);
  }
}
