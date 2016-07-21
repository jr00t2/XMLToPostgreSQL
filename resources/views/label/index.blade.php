@extends('layouts.app')

@section('content')
<div class="container">
    <form action="labels" method="GET">
        <input type="text" name="search" placeholder="insert ID" />
        <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </form>
    <div class="table-responsive">
        <table class="table">
            <th>ID</th>
            <th>LabelCode</th>
            <th>Labelname</th>
            <th>LabelShortname</th>
            <th>GVLMandant</th>
            <th>MusikHerkunft</th>
    @foreach ($labels as $label)
        <tr>
            <td>{{ $label->labelId }}</td>
            <td>{{ $label->labelcode }}</td>
            <td>{{ $label->labelname }}</td>
            <td>{{ $label->labelshortname }}</td>
            <td>{{ $label->gvlmandant }}</td>
            <td>{{ $label->musikherkunft }}</td>

        </tr>
    @endforeach
        </table>
    </div>
</div>

{!! $labels->appends(['search' => Illuminate\Support\Facades\Input::get('search')])->render() !!}
    @endsection