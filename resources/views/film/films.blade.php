@extends('layouts.master')

@section('title', 'Lista Film')


@section('body')

<script>
    $(document).ready(function() {

        $(".searchOptions").on("click", function(e) {
            e.preventDefault();
            var parametroRicerca = $(this).attr("data-column");
            $("#searchInput").attr("data-column", parametroRicerca);
            $("#searchInput").attr("placeholder", "Cerca per " + $(this).text().toLowerCase() + " film...");
            $("#searchInput").trigger("keyup"); // Riesegui la ricerca quando viene selezionata una colonna
        });

        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            var parametroRicerca = $("#searchInput").attr("data-column");

            if (value !== "") {
                // Nasconde la paginazione e mostra tutte le carte
                $("#paginationNav").hide();
                $(".card").parent().show();
            } else {
                // Mostra la paginazione e resetta la visualizzazione delle carte
                $("#paginationNav").show();
                paginateCards(); // Funzione che gestisce la paginazione
            }

            $(".card").each(function() {
                var found = false;
                if ((parametroRicerca == -1) || (parametroRicerca === undefined)) { // Selezionato "Titolo o regista" o nessuna opzione
                    // Cerca nel titolo
                    var title = $(this).find(".film-title").text().toLowerCase();
                    if (title.indexOf(value) > -1) {
                        found = true;
                    }
                    // Cerca nei registi
                    $(this).find(".regia div").each(function() {
                        var director = $(this).text().toLowerCase();
                        if (director.indexOf(value) > -1) {
                            found = true;
                        }
                    });

                } else if (parametroRicerca == 0) { // Cerca per Titolo
                    var title = $(this).find(".film-title").text().toLowerCase();
                    if (title.indexOf(value) > -1) {
                        found = true;
                    }

                } else if (parametroRicerca == 1) { // Cerca per Regista
                    $(this).find(".regia div").each(function() {
                        var director = $(this).text().toLowerCase();
                        if (director.indexOf(value) > -1) {
                            found = true;
                        }
                    });

                } else if (parametroRicerca == 2) { // Cerca per Anno uscita
                    var year = $(this).find(".anno-uscita").text().toLowerCase();
                    if (year.indexOf(value) > -1) {
                        found = true;
                    }
                }
                $(this).parent().toggle(found);
            });
        });

        function paginateCards() {
            var currentPage = 1;
            var rowsPerPage = parseInt($("#rowsPerPage").val());
            var $cards = $(".card");
            var totalPages = Math.ceil($cards.length / rowsPerPage);

            function showPage(page) {
                var start = (page - 1) * rowsPerPage;
                var end = start + rowsPerPage;

                $cards.parent().hide().slice(start, end).show(); // Mostra solo le card nella pagina corrente

                // Rimuovi i numeri di pagina esistenti
                $(".page-item.pageNumber").remove();

                // Calcola quali numeri di pagina visualizzare
                var startPage = Math.max(1, currentPage - 1);
                var endPage = Math.min(startPage + 2, totalPages);

                // Aggiungere i numeri di pagina calcolati al markup HTML
                for (var i = startPage; i <= endPage; i++) {
                    var $li = $("<li>", { class: "page-item pageNumber" });
                    var $link = $("<a>", { class: "page-link", href: "#", text: i });
                    if (i === currentPage) {
                        $li.addClass("active");
                    }
                    $li.append($link);
                    $li.insertBefore("#nextPage");
                }
            }

            function goToPreviousPage() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            }

            function goToNextPage() {
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                }
            }

            // Aggiorna il numero di righe per pagina quando viene selezionato un nuovo valore
            $("#rowsPerPage").on("change", function() {
                rowsPerPage = parseInt($(this).val());
                totalPages = Math.ceil($cards.length / rowsPerPage);
                currentPage = 1; // Torna alla prima pagina
                showPage(currentPage);
            });

            showPage(currentPage);

            $("#previousPage").on("click", goToPreviousPage);
            $("#nextPage").on("click", goToNextPage);

            $(document).on("click", ".pageNumber", function() {
                var page = parseInt($(this).text());
                currentPage = page;
                showPage(currentPage);
            });
        }

        paginateCards(); // Chiamata iniziale alla funzione di paginazione
    });
</script>



<div class="row">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Cerca per</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item searchOptions" href="#" data-column="0">Titolo</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="1">Regista</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="2">Anno uscita</a></li>
                <li><a class="dropdown-item searchOptions" href="#" data-column="-1">Titolo o regista</a></li>
            </ul>
        </div>
        <input type="text" id="searchInput" class="form-control" aria-label="Text input with dropdown button" placeholder="Cerca...">
    </div>
</div>


<div class="row">
    <div class="col-xs-6 d-flex justify-content">
        <p>
            <a class="btn btn-success" href="{{route('film.create')}}">
                <i class="bi bi-database-add"></i> 
                 Inserisci nuovo film
            </a>
        </p>
    </div>
</div>

<nav aria-label="Page navigation example" id="paginationNav">
    <ul class="pagination justify-content-center">
        <li class="page-item" id="previousPage"><a class="page-link" href="#">Precedente</a></li>
        <!-- Numeri di pagina -->
        <li class="page-item" id="nextPage"><a class="page-link" href="#">Successiva</a></li>
        <li>
            <select id="rowsPerPage" class="form-control justify-content-end">
                <option value="5">5 film per pagina</option>
                <option value="10">10 film per pagina</option>
                <option value="15">15 film per pagina</option>
                <option value="20">20 film per pagina</option>
                <option value="50">50 film per pagina</option>
            </select>
        </li>
    </ul>
</nav>

<div class="container">
    <div class="row filmCardsContainer">
        
            <!-- Inizio card per un film-->
            @foreach ($films_list as $film)
            <div class="col-md-4 mb-4">
                <!--TODO: gestire locandine-->
                
                <div class="card h-100" style="background-image: url('{{ asset('storage/' . $film->path_locandina)}}'); background-size: cover; background-position: center;">
                    <div class="card-body text-white" style="background: rgba(0, 0, 0, 0.5);">

                        <h4 class="card-title film-title"><strong>{{ $film->titolo }}</strong></h4>

                        <h5 class="card-subtitle mb-2 regia">Regia:
                            @foreach ($film->registi as $regista)
                                <div>{{ $regista->nome }} {{ $regista->cognome }}</div>
                                
                            @endforeach
                           
                        </h5>

                        <h5 class="card-text genere">Genere:
                            @foreach ($film->generi as $gen)
                                <div>{{$gen->nome}}</div>
                            @endforeach
                        </h5>

                        <p class="card-text anno-uscita">Anno: {{ $film->anno_uscita }}</p>

                        <p class="class-text durata-film">Durata: {{$film->durata}} min</p>
                        
                        <a class="btn btn-primary" 
                                href="{{ route('film.show', ['film' => $film->id]) }}">
                                <i class="bi bi-eye"></i>
                                Scheda film</a>

                        <a class="btn btn-secondary"
                                href="{{ route('film.edit', ['film' => $film->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                                Modifica Film</a>

                        <a class="btn btn-success"
                            href="{{route('programmazione.create', ['id' => $film->id])}}">
                            <i class="bi bi-clock-history"></i>    
                                Inserisci programmazione</a>


                        @if( count($film->proiezioni) == 0)
                        <a class="btn btn-danger" 
                                href="{{ route('film.destroy.confirm', ['id' => $film->id]) }}">
                                <i class="bi bi-trash"></i>
                                 Cancella Film</a>
                        @else
                            <a class="btn btn-secondary" disabled="disabled" href="#"><i class="bi bi-ban"></i> Cancella Film</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection