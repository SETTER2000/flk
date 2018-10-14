$(document).ready(function () {
    $.tablesorter.addWidget({
        // дать виджету идентификатор
        id: "formAdd",
        // формат вызывается, когда init и когда сортировка завершена
        format: function(table) {
            // кешировать и собирать все заголовки
            if(!this.headers) {
                var h = this.headers = [];
                $("thead th",table).each(function() {
                    h.push(
                        "" + $(this).text() + ""
                    );

                });
            }

            // удалите прикрепленные заголовки по имени класса.
            $("tr.repated-header",table).remove();

            // петли все три элемента и вставить копию "заголовков"
            for(var i=0; i < table.tBodies[0].rows.length; i++) {
                // вставьте копию таблицы в каждую десятую строку
                if((i%5) == 4) {
                    $("tbody tr:eq(" + i + ")",table).before(
                        $("").html(this.headers.join(""))

                    );
                }
            }
        }
    });


    $.tablesorter.addWidget({
        // give the widget a id
        id: "repeatHeaders",
        // format is called when the on init and when a sorting has finished
        format: function(table) {
            // cache and collect all TH headers
            if(!this.headers) {
                var h = this.headers = [];
                $("thead th",table).each(function() {
                    h.push(
                        "" + $(this).text() + ""
                    );

                });
            }

            // remove appended headers by classname.
            $("tr.repated-header",table).remove();

            // loop all tr elements and insert a copy of the "headers"
            for(var i=0; i < table.tBodies[0].rows.length; i++) {
                // insert a copy of the table head every 10th row
                if((i%5) == 4) {
                    $("tbody tr:eq(" + i + ")",table).before(
                        $("").html(this.headers.join(""))

                    );
                }
            }
        }
    });


    var pagerOptions = {

            // target the pager markup - see the HTML block below
            container: $(".pager"),

            // use this url format "http:/mydatabase.com?page={page}&size={size}&{sortList:col}"
            ajaxUrl: null,
            positionFixed: false,
            // modify the url after all processing has been applied
            customAjaxUrl: function (table, url) {
                return url;
            },
        widgets: ['zebra','formAdd','repeatHeaders'],
        // ajax error callback from $.tablesorter.showError function
            // ajaxError: function( config, xhr, settings, exception ) { return exception; };
            // returning false will abort the error message
            ajaxError: null,

            // add more ajax settings here
            // see http://api.jquery.com/jQuery.ajax/#jQuery-ajax-settings
            ajaxObject: {dataType: 'json'},

            // process ajax so that the data object is returned along with the total number of rows
            ajaxProcessing: null,

            // Set this option to false if your table data is preloaded into the table, but you are still using ajax
            processAjaxOnInit: true,

            // output string - default is '{page}/{totalPages}'
            // possible variables: {size}, {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
            // also {page:input} & {startRow:input} will add a modifiable input in place of the value
            // In v2.27.7, this can be set as a function
            // output: function(table, pager) { return 'page ' + pager.startRow + ' - ' + pager.endRow; }
            output: '{startRow:input} – {endRow} / {totalRows} rows',

            // apply disabled classname (cssDisabled option) to the pager arrows when the rows
            // are at either extreme is visible; default is true
            updateArrows: true,

            // starting page of the pager (zero based index)
            page: 0,

            // Number of visible rows - default is 10
            size: 3,

            // Save pager page & size if the storage script is loaded (requires $.tablesorter.storage in jquery.tablesorter.widgets.js)
            savePages: true,

            // Saves tablesorter paging to custom key if defined.
            // Key parameter name used by the $.tablesorter.storage function.
            // Useful if you have multiple tables defined
            storageKey: 'tablesorter-pager',

            // Reset pager to this page after filtering; set to desired page number (zero-based index),
            // or false to not change page at filter start
            pageReset: 0,

            // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
            // table row set to a height to compensate; default is false
            fixedHeight: true,

            // remove rows from the table to speed up the sort of large tables.
            // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
            removeRows: false,

            // If true, child rows will be counted towards the pager set size
            countChildRows: false,

            // css class names of pager arrows
            cssNext: '.next', // next page arrow
            cssPrev: '.prev', // previous page arrow
            cssFirst: '.first', // go to first page arrow
            cssLast: '.last', // go to last page arrow
            cssGoto: '.gotoPage', // select dropdown to allow choosing a page

            cssPageDisplay: '.pagedisplay', // location of where the "output" is displayed
            cssPageSize: '.pagesize', // page size selector - select dropdown that sets the "size" option

            // class added to arrows when at the extremes (i.e. prev/first arrows are "disabled" when on the first page)
            cssDisabled: 'disabled', // Note there is no period "." in front of this class name
            cssErrorRow: 'tablesorter-errorRow' // ajax error information row

        };

        $("#myTable").tablesorter({
            sortList: [[0, 0]],
            headers: {
                2: {sorter: false},
                3: {sorter: false},
                5: {sorter: false}
            },
            // widthFixed:  true ,
        })
            .tablesorterPager(pagerOptions)
        // .tablesorterPager({
        // container: $("#pager"),
        // size: 3
        // })
        ;

        $("#ajax-append").click(function() {
            $.get("/application/views/ajax-content.html", function(html) {
                // append the "ajax'd" data to the table body
                $("#myTable tbody").append(html);
                // let the plugin know that we made a update
                $("#myTable").trigger("update");
                // set sorting column and direction, this will sort on the first and third column
                var sorting = [[2,1],[0,0]];
                // sort on the first column
                $("#myTable").trigger("sorton",[sorting]);
            });
            return false;
        });

    }
);

function previewFile() {
    var preview = document.querySelector('#myimg');
    var preview2 = document.querySelector('#myimg2');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    var reader2 = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
    reader2.addEventListener("load", function () {
        preview2.src = reader2.result;
    }, false);

    if (file) {
        reader2.readAsDataURL(file);
    }
}

