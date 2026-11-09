<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use App\Data\PrototypeData;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $config = DemoStore::config();

        return view('pages.home', [
            'config' => $config,
            'alerts' => PrototypeData::activeAlerts(),
            'bulletins' => array_slice(PrototypeData::bulletins(), 0, 4),
            'roads' => array_slice(PrototypeData::roads(), 0, 3),
            'helplines' => PrototypeData::helplines(),
        ]);
    }

    public function weather(): View
    {
        return view('pages.weather', [
            'alerts' => PrototypeData::activeAlerts(),
            'cities' => PrototypeData::weatherCities(),
            'forecastsByCity' => PrototypeData::forecastsByCity(),
        ]);
    }

    public function alerts(): View
    {
        return view('pages.alerts', [
            'alerts' => PrototypeData::activeAlerts(),
            'regions' => PrototypeData::regionMap(),
        ]);
    }

    public function news(): View
    {
        return view('pages.news', [
            'bulletins' => PrototypeData::bulletins(),
        ]);
    }

    public function newsShow(string $slug): View
    {
        $bulletin = PrototypeData::bulletin($slug);
        abort_if($bulletin === null, 404);

        return view('pages.news-show', ['bulletin' => $bulletin]);
    }

    public function roads(): View
    {
        return view('pages.roads', [
            'roads' => PrototypeData::roads(),
        ]);
    }

    public function situation(): View
    {
        return view('pages.situation', [
            'situation' => PrototypeData::situation(),
            'timeline' => PrototypeData::situationTimeline(),
        ]);
    }

    public function missing(): View
    {
        return view('pages.missing', [
            'records' => DemoStore::verifiedMissing(),
        ]);
    }

    public function missingReport(): View
    {
        return view('pages.missing-report', [
            'regions' => PrototypeData::ghanaRegions(),
        ]);
    }

    public function incidentReport(): View
    {
        return view('pages.incident-report', [
            'regions' => PrototypeData::ghanaRegions(),
        ]);
    }

    public function rescue(): View
    {
        return view('pages.rescue');
    }

    public function relief(): View
    {
        return view('pages.relief', [
            'resources' => PrototypeData::reliefResources(),
            'helplines' => PrototypeData::helplines(),
        ]);
    }

    public function history(): View
    {
        return view('pages.history', [
            'datasets' => PrototypeData::historyDatasets(),
            'defaultKey' => 'all',
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function dataSources(): View
    {
        return view('pages.data-sources');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }
}
