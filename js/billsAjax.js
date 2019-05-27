


function saveAllOpenBills(new_bills_json){
    var url='http://ilayel.mtacloud.co.il/homies/dev/billsController.php';
    $.post(url,
    {
        "jsonDataNew": new_bills_json,
     //   "jsonDataDb": db_bills_json,
        "requestType": "saveAllOpenBills"
    },
    function(data, status){

        console.log(data);
        console.log("bills was saved good");

    });
}


function loadBillsFromDbAjax(payTable1){
    var url='billsController.php';
    $.post(url,
    {
        "requestType": "loadBills"
    },
    function(data, status){

        try {
            data =JSON.parse(data);
            }
        catch(err) {
         data =null;   
         console.log("No bills was found in db");
        }

        console.log(data);

        var rowsAmountFromDb= renderBills(data,payTable1);

        return  rowsAmountFromDb;  // return the number of rows
    });
}


function payBillAjax(row_id,row_type,data){
    var url='billsController.php';
    $.post(url,
    {
        "jsonData": data,
        "rowType": row_type,
        "rowId": row_id,
        "requestType": "payBill"
    },
    function(data, status){

        var row= $("#"+row_type+row_id).parent().parent().parent();
        alert("bills was payed");

        var name=row.find("#delete").attr('class');
        console.log(name);
        deleteMe2(name);

        //$(row[0]["children"][5]["childNodes"][0]).click();
        console.log(data);
        

    });
}



function getBillsHistoryWithFiltersAjax(month,year,bill_type,tablePay){
    var url='billsController.php';
    $.post(url,
    {
        "month": month,
        "year": year,
        "bill_type": bill_type,
        "requestType": "getBillsHistoryWithFilters"
    },
    function(data, status){

        try {
            data =JSON.parse(data);
            }
        catch(err) {
         data =null;   
         console.log("No bills was found in db");
        }


        console.log("The history is");
        console.log(data);

        appendBillsHistoryRows(data,tablePay);

        return  data;  // return the number of rows
    });
}



