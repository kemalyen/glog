<?php

namespace Gazatem\Glog\Http\Controllers;

use Gazatem\Glog\Model\MySql\Log as MySqlLogger;
use Gazatem\Glog\Model\MongoDb\Log as MongoDbLogger;
use Gazatem\Glog\Repositories\LogRepository;
use Gazatem\Glog\Repositories\RepositoryContract;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GlogController extends BaseController
{

    private $log_repository;

    public function __construct(LogRepository $repositoryContract)
    {
        $this->log_repository = $repositoryContract;

        parent::__construct();
    }

    public function index(Request $request)
    {
        $start_date = $request->get('start_date', null);
        $end_date = $request->get('end_date', null);

        $level = $request->get('level', null);
        $channel = $request->get('channel', null);

        $logs = $this->log_repository
            ->where('level_name', $level)
            ->where('channel', $channel)
            ->whereDate('created_at', $start_date)
            ->whereDate('created_at', $end_date)
            ->orderBy('created_at', 'desc')
            ->get();


        $translations = config('glog.translations');
        $levels = config('glog.levels');
        $channels = config('glog.channels');

        $labels = ['EMERGENCY' => 'danger', 'ALERT' => 'danger', 'CRITICAL' => 'warning', 'ERROR' => 'danger', 'WARNING' => 'warning', 'NOTICE' => 'default', 'INFO' => 'info', 'DEBUG' => 'success'];

        return view('glog::index', compact('logs', 'translations', 'levels', 'level', 'channel', 'start_date', 'end_date', 'channels', 'labels'));
    }
}
