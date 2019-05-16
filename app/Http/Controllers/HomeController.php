<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\Point_de_transfert;
use App\Models\Transfert;
use App\Charts\statTrans;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trans= transfert::all();
        $jourj = transfert::whereDate('created_at', today())->count();
        $j1 = transfert::whereDate('created_at', today()->subDays(1))->count();
        $j2 = transfert::whereDate('created_at', today()->subDays(2))->count();
        $j3 = transfert::whereDate('created_at', today()->subDays(3))->count();
        $j4 = transfert::whereDate('created_at', today()->subDays(4))->count();
        $j5 = transfert::whereDate('created_at', today()->subDays(5))->count();
        $j6 = transfert::whereDate('created_at', today()->subDays(6))->count();
        $benefj = transfert::whereDate('created_at', today())->sum('tarif');
        $b1 = transfert::whereDate('created_at', today()->subDays(1))->sum('tarif');
        $b2 = transfert::whereDate('created_at', today()->subDays(2))->sum('tarif');
        $b3 = transfert::whereDate('created_at', today()->subDays(3))->sum('tarif');
        $b4 = transfert::whereDate('created_at', today()->subDays(4))->sum('tarif');
        $b5 = transfert::whereDate('created_at', today()->subDays(5))->sum('tarif');
        $b6 = transfert::whereDate('created_at', today()->subDays(6))->sum('tarif');

        $stats= new statTrans;
        $stats->labels(['6 jour avant','5 jour avant','4 jour avant','3 jour avant','2 jour avant','hier','aujordhui']);
        $dataset = $stats->dataset('nombre de transaction par jour', 'bar', [$j6, $j5, $j4,$j3,$j2,$j1,$jourj]);
        $dataset->backgroundColor(['red','blue', 'green']);
        $dataset->color(['#C5CAE9', '#783593','#283593']);
        $benefice= new statTrans;
        $benefice->labels(['6 jour avant','5 jour avant','4 jour avant','3 jour avant','2 jour avant','hier','aujordhui']);
        $dataset = $benefice->dataset('benifice par jour', 'bar', [$b6, $b5, $b4,$b3,$b2,$b1,$benefj]);
        $dataset->backgroundColor(['red','blue', 'green']);
        $dataset->color(['#C5CAE9', '#783593','#283593']);

        $sommeCaiss=Point_de_transfert::sum('caisse');
        $sommeRetrai=Transfert::where('status','=',false)->sum('montant');
        $gain=Transfert::where('created_at','=',now())->sum('tarif');
        $capital=$sommeCaiss-$sommeRetrai;
        //return(now());
        return view('admin',compact('benefice','stats','sommeCaiss','sommeRetrai','capital','gain'));
    }
}
