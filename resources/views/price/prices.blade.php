@extends ('layouts.master')

@section('title', 'I nostri prezzi')

@section('breadcrumb')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Library</li>
<li class="breadcrumb-item active" aria-current="page">Books</li>
@endsection


@section('body')
    <div class="container">
    <ul class="nav nav-tabs" id="priceTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="garden-tab" data-bs-toggle="tab" data-bs-target="#garden" type="button" role="tab" aria-controls="garden" aria-selected="true">Garden</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="iride-tab" data-bs-toggle="tab" data-bs-target="#iride" type="button" role="tab" aria-controls="iride" aria-selected="false">Iride</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="abbonamenti-tab" data-bs-toggle="tab" data-bs-target="#abbonamenti" type="button" role="tab" aria-controls="abbonamenti" aria-selected="false">Abbonamenti</button>
        </li>
    </ul>
    <div class="tab-content" id="priceTabContent">
        <div class="tab-pane  fade show active" id="garden" role="tabpanel" aria-labelledby="garden-tab">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Proiezione tradizionale</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Adulti</td>
                <td>10 €</td>
            </tr>

            <tr>
                <td>Bambini (Under 10)</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>Senior (Over 65)</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>Sabato pomeriggio - proiezioni fino alle 18.00</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>LUN - MAR - MER (tutte le proiezioni)</td>
                <td>7 €</td>
            </tr>

            </tbody>
        </table>
    </div>

        <div class="tab-pane fade" id="iride" role="tabpanel" aria-labelledby="iride-tab">
        <table class="table table-secondary table-striped">
        <thead>
            <tr>
                <th>Proiezione tradizionale</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Adulti</td>
                <td>9 €</td>
            </tr>

            <tr>
                <td>Bambini (Under 10)</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>Senior (Over 65)</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>Sabato pomeriggio - proiezioni fino alle 18.00</td>
                <td>7 €</td>
            </tr>

            <tr>
                <td>LUN - tutte le proiezioni</td>
                <td>7 €</td>
            </tr>

        </tbody>
    </table>
    </div>

        <div class="tab-pane fade" id="abbonamenti" role="tabpanel" aria-labelledby="abbonamenti-tab">
            <table class="table table-striped mt-3">
                <tbody>
                    
                    <tr>
                        <td>6 ingressi</td>
                        <td>42 €</td>
                    </tr>
                    <tr>
                        <td>10 ingressi</td>
                        <td>70 €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection