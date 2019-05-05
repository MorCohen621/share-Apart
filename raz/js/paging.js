function Pager(tableName, itemsPerPage) {

    this.tableName = tableName;

    this.itemsPerPage = itemsPerPage;

    this.currentPage = 0;

    this.pages = 0;

    this.inited = false;



    this.showRecords = function(from, to) {

        var rows = document.getElementById(tableName).rows;

        // i starts from 1 to skip table header row

        for (var i = 1; i < rows.length; i++) {

            if (i < from || i > to)

                rows[i].style.display = 'none';

            else

                rows[i].style.display = '';

        }



        if(rows.length > 1)showStatusResult(rows.length,from,to);

    }



    this.showPage = function(pageNumber) {

    	if (! this.inited) {

    		alert("not inited");

    		return;

    	}



        var oldPageAnchor = document.getElementById('pg'+this.currentPage);

        if(oldPageAnchor != null)oldPageAnchor.className = 'paginate_button';



        this.currentPage = pageNumber;

        var newPageAnchor = document.getElementById('pg'+this.currentPage);

        if(newPageAnchor != null)newPageAnchor.className = 'paginate_button current';



        var from = (pageNumber - 1) * itemsPerPage + 1;

        var to = from + itemsPerPage - 1;

        this.showRecords(from, to);

    }



    this.prev = function() {

        if (this.currentPage > 1)

            this.showPage(this.currentPage - 1);

    }



    this.next = function() {

        if (this.currentPage < this.pages) {

            this.showPage(this.currentPage + 1);

        }

    }



    this.init = function() {

        var rows = document.getElementById(tableName).rows;

        var records = (rows.length - 1);

        this.pages = Math.ceil(records / itemsPerPage);

        this.inited = true;

    }



    this.showPageNav = function(pagerName, positionId) {

    	if (! this.inited) {

    		alert("not inited");

    		return;

    	}

      console.log(positionId);

    	var element = document.getElementById(positionId);



    	var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="paginate_button previous"> &#171 Prev </span> ';

        for (var page = 1; page <= this.pages; page++)

            pagerHtml += '<span id="pg' + page + '" class="paginate_button" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span>  ';

        pagerHtml += '<span onclick="'+pagerName+'.next();" class="paginate_button next"> Next &#187;</span>';



        element.innerHTML = pagerHtml;

    }



    this.getPages = function () {

        return this.pages;

    }



    this.getCurrentPage = function () {

        return this.currentPage;

    }



}

