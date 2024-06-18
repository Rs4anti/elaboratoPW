$(document).ready(function(){
    // Pagination feature
    var currentPage = 1;
    var rowsPerPage = parseInt($("#rowsPerPage").val()); // Numero di righe per pagina
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
});
