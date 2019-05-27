
/* init 3 tables */
var pager1,pages ;

function setPagination(pageSelected) {
    if(pages == 0)return;
    var pagerHtml = '<span onclick="prevPage();" class="paginate_button previous"> Prev </span> ';
    for (var page = 1; page <= pages; page++)
        pagerHtml += '<span id="pg' + page + '" class="paginate_button main-' +page+'" onclick="selectPage(' + page + ');">' + page + '</span>  ';
    pagerHtml += '<span onclick="nextPage();" class="paginate_button next"> Next </span>';
    $('#main-pagination').html(pagerHtml);
    $('.main-'+pageSelected).addClass('current');

}

function initPages(table_name,count) {

    pager1 = new Pager(table_name,count);
    pager1.init();
    pages = pager1.getPages();

}

/* custom next table */
function nextPage() {
    pager1.next();
}
/* custom prev table */
function prevPage() {
    pager1.prev();
}

/* change page for all tables */
function selectPage(num) {
    pager1.showPage(num);
}



/* refresh tables when add or remove row */
function refreshPapers(to) {

    var page = pager1.getCurrentPage();

    pager1.init();
    pager1.showPageNav('pager1', 'pagination2');
    pager1.showPage(page);

    page = pager1.getCurrentPage();
    var currentPages = pager1.getPages();

    if(currentPages < pages){
        pages = currentPages;
        pager1.showPage(page -1);

        setPagination(page -1)
    } else {
        pages = currentPages;
        if(typeof to !== 'undefined'){
            pager1.showPage(to);
            setPagination(to)
        } else {
            pager1.showPage(page);
            setPagination(page)
        }

    }

}


/* show number rows on corner of tables */
function showStatusResult(total,from,to) {
    $('#count-record').show();
    $('#total-records').text(total-1);
    $('#to-record').text(total-1 < to ? total -1 : to);
    $('#from-record').text(from);
}

$('#option-length').on('change',function () {

});
