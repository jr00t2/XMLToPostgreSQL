@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="manufacturers" method="GET">
            <input type="text" name="search" placeholder="insert gvlcode" />
            <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <th>GVL_CODE</th>
                <th>Name1</th>
                <th>Name2</th>
                <th>Name3</th>
                <th>Street</th>
                <th>CountryCode</th>
                <th>Zip</th>
                <th>Postbox</th>
                <th>Phone</th>
                <th>Fax</th>
                <th>IfpiAccount</th>
                @foreach ($manufacturers as $manufacturer)
                    <tr>
                        <td>{{ $manufacturer->gvlcode }}</td>
                        <td>{{ $manufacturer->firstname }}</td>
                        <td>{{ $manufacturer->secondname }}</td>
                        <td>{{ $manufacturer->thirdname }}</td>
                        <td>{{ $manufacturer->street }}</td>
                        <td>{{ $manufacturer->countrycode }}</td>
                        <td>{{ $manufacturer->zip }}</td>
                        <td>{{ $manufacturer->postbox }}</td>
                        <td>{{ $manufacturer->phone }}</td>
                        <td>{{ $manufacturer->fax }}</td>
                        <td>{{ $manufacturer->ifpiaccount }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {!! $manufacturers->appends(['search' => Illuminate\Support\Facades\Input::get('search')])->render() !!}
@endsection