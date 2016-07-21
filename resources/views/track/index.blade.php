@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <th>TRK_MANR</th>
            <th>TRK_TRACK</th>
            <th>LBL_LABELCODE</th>
            <th>LBL_LABEL</th>
            <th>TRK_ISRC</th>
            <th>TRK_CATALOGNO</th>
            <th>TRK_EAN</th>
            <th>TRK_RELEASE_DATE</th>
            <th>TRK_COMPOSER</th>
    @foreach ($tracks as $track)
        <tr>
            <td>{{ $track->manr }}</td>
            <td>{{ $track->track }}</td>
            <td>{{ $track->labelcode }}</td>
            <td>{{ $track->label }}</td>
            <td>{{ $track->isrc }}</td>
            <td>{{ $track->ean }}</td>
            <td>{{ $track->catalogno }}</td>
            <td>{{ $track->release_date }}</td>
            <td>{{ $track->composer }}</td>
        </tr>
    @endforeach
        </table>
    </div>
</div>

{!! $tracks->render() !!}
    @endsection