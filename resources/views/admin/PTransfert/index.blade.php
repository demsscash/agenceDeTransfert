@extends('layouts.base')

@section('content')
    <div class="listtitre">
    <h3><span class="creU"></span> Points de transfert <a href="{{ route('PTransfert.create') }}" class="btn bajouter"><i class="fa fa-plus"></i> Ajouter</a>   <a href="{{ route('listePoint') }}" class="btn btn-primary"><i class="fa fa-export"></i> exporter</a></h3>

    </div>
    <div class="scroll" style="box-shadow: 1px 0px 0px 2px gray;">
    <table class="table table-striped table-bordered tbD" id="PTable">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cartier</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($PTransfert))
            @foreach($PTransfert as $row)
            <tr>

                <td>{{$row->nom}}</td>
                <td>{{$row->cartier}}</td>

                  @if (count($PTransfert))
                  @foreach($villes as $row2)
                      @if ($row->id_ville==$row2->id_ville)
                      <td>{{$row2->nom}}</td>
                      @endif
                  @endforeach
                  @endif



                <td>
                    <a href="{{ route('PTransfert.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a href="{{ route('PTransfert.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>

@endsection
