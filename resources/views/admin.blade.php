@extends('layouts.base')

@section('content')
<div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h2><i class="fa fa-rocket f-left"></i><span class="tx">{{ $sommeCaiss }} UM</span></h2>
                    <h4 class="m-b-0">Somme Actuel des caisse</h4>
                </div>
            </div>
        </div>
         
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h2><i class="fa fa-rocket f-left"></i><span>{{ $sommeRetrai }} UM</span></h2>
                    <h4 class="m-b-0">Somme des retrais non effectue</h4>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h2><i class="fa fa-refresh f-left"></i><span>{{ $capital }} UM</span></h2>
                    <h4 class="m-b-0">Capital</h4>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h2><i class="fa fa-credit-card f-left"></i><span>{{ $gain }} UM</span></h2>
                    <h4 class="m-b-0">gain journalie</h4>
                </div>
            </div>
        </div>
	</div>
<div class="col-sm-4">
{!! $stats->container() !!}
</div>
<div class="col-sm-4">
    {!! $benefice->container() !!}
</div>
{!! $stats->script() !!}
{!! $benefice->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

