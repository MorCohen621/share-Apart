
      
   //dealing with option: other
   
   function showfield(id, name) {
   
       if (name == 'Other') {
   
           $('#' + id).css('display', 'block');
   
       } else {
   
           $('#' + id).css('display', 'none');
   
       }
   
   }
   
   //delete row
   
   function deleteMe(name) {
   
       var row = $("." + name).parent(); 


       if(confirm("delete selected row")==1)
       {

       var table = $('#pay_bills').DataTable();
       table.row(row ).remove();
       table.draw();
    
   }
 }
 function deleteMe2(name) {
   
       var row = $("." + name).parent();

       var table = $('#pay_bills').DataTable();
       table.row(row ).remove();
       table.draw();
    
   
 }


   function dateInShortDate(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        } 
        var today = yyyy+'-'+mm+'-'+dd;
        return today;
   }

  function validateAllBillsRows(){
      var input_array= $("#pay_bills tbody input");
      var select_array= $("#pay_bills tbody select");

      var valid=true;

      for(var j=0;j<input_array.length;j+=5 ){

        var id=[];
        var row= parseInt(j/5);

         id[1] = input_array[j]["id"];
         id[2] = select_array[row]["id"];
         id[3] = input_array[j+1]["id"];
         id[4] = input_array[j+2]["id"];
         id[5] = input_array[j+3]["id"];
         id[6] = input_array[j+4]["id"];

        var value=[];

         value[1]=input_array[j]["value"];
         value[2]=select_array[0]["value"];
         value[3]=input_array[j+1]["value"];
         value[4]=input_array[j+2]["value"];
         value[5]=input_array[j+3]["value"];
         value[6]=input_array[j+4]["value"];


        var input_curropted=false;

       for(var index=1;index<7;index++ ){
        if (typeof value[index] == 'undefined' ||  value[index]==null){

           $("#"+id[index]).css("border", "2px solid red");
          input_curropted=true;
        }
      }
      
      if (!input_curropted) {
        if (value[1]==""){
          $("#"+id[1]).css("border", "2px solid red");
          input_curropted=true;
        }
        if (value[4]=="" || value[4]==0){
          $("#"+id[4]).css("border", "2px solid red");
          input_curropted=true;
        }
        if (value[5]=="") {
          $("#"+id[5]).css("border", "2px solid red");
          input_curropted=true;
        }

        if ( value[2]=="Other" && value[3]==""){
          $("#"+id[3]).css("border", "2px solid red");
          input_curropted=true;
        }

      }
      
      }

      if (input_curropted){ alert("please fill all the data");}
      else{ $("#pay_bills tbody input").css("border", "");}

      return !input_curropted;
      }


  function saveAllBills(){

      //var flag=validateAllBillsRows();
      var flag=true;
      if (flag){

            var input_array= $("#pay_bills input");
            var select_array= $("#pay_bills select");
            var allBillsNewRows= {};
            var allBillsDbRows= {};


            var group_id=1;

            for(var j=0;j<input_array.length;j+=5 ){

                 var row= parseInt(j/5);
                 var type=select_array[row]["value"];

                 if (type=="Other"){
                  type=input_array[j+1]["value"];
                 }
                 input_array[j+1]; 

                //var db_type=$(".db_type_"+(row+1))["0"]["id"];
                 
                 
                   allBillsNewRows[row]={
                         'date_added':input_array[j]["value"],
                         'type' : type, 
                         'amount':input_array[j+2]["value"],
                         'due_date':input_array[j+3]["value"],
                         'comments':input_array[j+4]["value"]
                          };
                
               //if ( db_type.startsWith("new_") ){
                // }
                // else{
                 //    allBillsDbRows[row]={
                      //     'date_added':input_array[j]["value"],
                     //      'type' : type, 
                      //     'amount':input_array[j+2]["value"],
                     //      'due_date':input_array[j+3]["value"],
                     //      'comments':input_array[j+4]["value"]
                     //       };
                 //}


            }

            allBillsNewRowsJson=JSON.stringify(allBillsNewRows);

            //console.log(allBillsRowsJson);
            saveAllOpenBills(allBillsNewRowsJson);

       }else{
        alert("Please enter valid data");
       }
   }

    function loadBillsFromDb(payTable){

     var rowsAmount=loadBillsFromDbAjax(payTable);

     return rowsAmount;
    }


    function payMe(payID,recordType){

    var rowData= {};
    var row= $("#"+recordType+payID).parent().parent().parent();

    var input_array= row.find("input");
    var select_array=row.find("select");

    if (recordType=="new_") {

                       var type=select_array[0]["value"];

                         if (type=="Other"){
                          type=input_array[1]["value"];
                         }
                       
                         rowData[0]={
                         'date_added':input_array[0]["value"],
                         'type' : type, 
                         'amount':input_array[2]["value"],
                         'due_date':input_array[3]["value"],
                         'comments':input_array[4]["value"]
                          };
    }

     BillRowsJson=JSON.stringify(rowData);


     payBillAjax(payID,recordType,BillRowsJson);
    
    console.log(rowData);
    

    }



    function  renderBills(data,payTable){

      var k=0;

       if ( Array.isArray(data) ){

              for(k;k<data.length;k++ ){
                    var temp= [];
                    temp.push(data[k]);
                    createNewRow(k,temp,payTable);

              }
      }
      else{
        console.log("fail if ");
      }

      countNew=k;
     
      $('#addRow').on('click', function(e) {

           //t.row.add( [ ] ).draw( false );
           //prevent more clicking
           e.preventDefault(); // hide no data div
           data=[];
           countNew=createNewRow(countNew,data,payTable);
           $( "#pay_bills tr:last" ).css({ backgroundColor: "LightGreen"});
           console.log(countNew);   // create new row
       });

       return k;
       }

     



    function  createNewRow(countNew,dataArr,payTable){
  
          var record_type='new_';
          var currentDate=dateInShortDate();
          countNew++;
          var pay_id=countNew;


          if (typeof dataArr == 'undefined' || ( dataArr instanceof Array  && dataArr.length <= 0)) {
           
                dataArr.push({
                          amount: 0,
                          b_status:"",
                          bill_id: "",
                          comments: "",
                          date_added:currentDate,
                          due_date:currentDate,
                          group_id: "",
                          other: 0,
                          paid_date:"",
                          type:"Gas"
                      });  
            console.log(dataArr);
          }
          else{
            record_type='fromDb_';
            color="#efefef";
            pay_id=dataArr[0]['bill_id'];

          }

          //$('.dataTables_empty').css('display', 'none');
           var rows = document.getElementById('pay_bills').rows.length;
            //intialize tooltips

           
          /*

           var rowTB1 =
  
               "<tr data-type='new' class='row" + rows + "'>" +

               
              '<td class="sorting_' + countNew + '" style="background-color: ' + color + ' !important"> <input id="sorting_' + countNew + '" class="datepicker  datepickerBills" name="date"> </td>' +

               //'<td class="sorting_' + countNew + '" style="background-color: ' + color + ' !important"> <input id="sorting_' + countNew + '" type="date" name="date"> </td>' +
   
               '<td class="types' + countNew + '" style="background-color: ' + color + ' !important">' +
   
               ' <select name="type_payments" id="types_' + countNew +
   
               '" onchange="showfield(\'other_' + countNew + ' \',this.options[this.selectedIndex].value)">&gt;' +
   
               '<option value="Gas">Gas</option>' +
   
               '<option value="Electricity">Electricity</option>' +
   
               '<option value="Water Charges">Water Charges</option>' +
   
               '<option value="Municipal Taxes">Municipal Taxes</option>' +
   
               '<option value="Other">Other</option>' +
   
               '</select>' +
   
               '<div id="other_' + countNew + '" class"other_title" style="display: none;">' +
   
               '<input id="otherValue_' + countNew + '"   type="text" name="additional_option">' +
   
               '</div>' +
   
               '</td>' +
   
               '<td class="sum_' + countNew + '" style="background-color: ' + color + ' !important"> <input type="number" id="sum_' + countNew + '" name="sum" value="10" step="10" min="10"> </td>' +
   
               '<td class="sorting_' + countNew + '" style="background-color: ' + color + ' !important"> <input id="sorting2_' + countNew + '"  class="datepicker  datepickerBills" name="date"> </td>' +
               //'<td class="sorting_' + countNew + '" style="background-color: ' + color + ' !important"> <input id="sorting2_' + countNew + '" type="date" name="date"> </td>' +
   
               '<td class="comments_' + countNew + '" style="background-color: ' + color + ' !important"> <input id="comments_' + countNew + '" type="text" rows="1" name="comments"></input> </td>' +  
   
               '<td id="delete" class="delete_' + countNew + '" onClick="deleteMe(\'delete_' + countNew + ' \')" style="background-color: ' + color + ' !important"> <button data-toggle="tooltip" data-placement="right" title="remove from bills" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove" style="font-family:Glyphicons Halflings !important"></i></button> </td>' +
               '<td id="pay" class="pay_' + countNew + '" style="background-color: ' + color + ' !important"> <button title="Mark as payed" id="'+ record_type + pay_id + '" type="button" class="btn pay_' + countNew + '" onClick="payMe(' + pay_id + ',\'' + record_type +'\' )" ><span class="glyphicon glyphicon-usd" style="font-family:Glyphicons Halflings !important"></span></button> </td>'
   
               '</tr>';
              */
   

           //$('#pay_bills').prepend(rowTB1);


            var td1='<div class="sorting_' + countNew + '" style="background-color: ' + ' !important"> <input id="sorting_' + countNew + '" class="datepicker  datepickerBills" name="date" disabled> </div>' ;

            var td2='<div class="types' + countNew + '" style="background-color: ' + ' !important">' +
   
               ' <select name="type_payments" id="types_' + countNew +
   
               '" onchange="showfield(\'other_' + countNew + ' \',this.options[this.selectedIndex].value)">&gt;' +
   
               '<option value="Gas">Gas</option>' +
   
               '<option value="Electricity">Electricity</option>' +
   
               '<option value="Water Charges">Water Charges</option>' +
   
               '<option value="Municipal Taxes">Municipal Taxes</option>' +
   
               '<option value="Other">Other</option>' +
   
               '</select>' +
   
               '<div id="other_' + countNew + '" class"other_title" style="display: none;">' +
   
               '<input id="otherValue_' + countNew + '"   type="text" name="additional_option">' +
   
               '</div>' +
   
               '</div>';


            var td3='<div class="sum_' + countNew + '" style="background-color: '  + ' !important"> <input type="number" id="sum_' + countNew + '" name="sum" value="10" step="10" min="10"> </div>';
            var td4='<div class="sorting_' + countNew + '" style="background-color: '  + ' !important"> <input id="sorting2_' + countNew + '"  class="datepicker  datepickerBills" name="date"> </div>';
            var td5='<div class="comments_' + countNew + '" style="background-color: '  + ' !important"> <input id="comments_' + countNew + '" type="text" rows="1" name="comments"></input> </div>';
            var td6='<div id="delete" class="delete_' + countNew + '" onClick="deleteMe(\'delete_' + countNew + ' \')" style="background-color: '  + ' !important"> <button data-toggle="tooltip" data-placement="right" title="remove from bills" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove" style="font-family:Glyphicons Halflings !important"></i></button> </div>';
            var td7='<div id="pay" class="pay_' + countNew + '" style="background-color: '  + ' !important"> <button title="Mark as payed" id="'+ record_type + pay_id + '" type="button" class="btn pay_' + countNew + '" onClick="payMe(' + pay_id + ',\'' + record_type +'\' )" ><span class="glyphicon glyphicon-usd" style="font-family:Glyphicons Halflings !important"></span></button> </div>';


            
            
            payTable.row.add([td1,td2,td3,td4,td5,td6,td7]);



            payTable.draw() ;




           pages = pager1.getPages();
           refreshPapers(1);
           $("#sorting_"+countNew).val(dataArr[0]['date_added']);
           $("#sorting2_"+countNew).val(dataArr[0]['due_date']);
           $("#sum_"+countNew).val(dataArr[0]['amount']);
           $("#comments_"+countNew).val(dataArr[0]['comments']);

           var type=dataArr[0]['other'];

           if (type == "1"){
            $("#types_"+countNew).val('Other');
            $("#other_"+countNew).css('display', 'block');
            $("#otherValue_"+countNew).val(dataArr[0]['type']);
            
            

           }
           else{
             $("#types_"+countNew).val(dataArr[0]['type']);
           }

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });

        $('.datepickerBills').on('hide', function(e){

           var chooseDate= $(this).val();
           var parsedDate= Date.parse(chooseDate);
           if(!parsedDate)
           {
            $(this).val(dateInShortDate());
           }
});


           return countNew;
    }



    function appendBillsHistoryRows(data,table){

      $("#report_body").html("");


       var k=0;
       if ( Array.isArray(data) ){

              table.clear() ;

              for(k;k<data.length;k++ ){
                         table.row.add([data[k]["paid_date"],data[k]["type"],data[k]["amount"],data[k]["due_date"]]);
              }

                  table.draw() ;
      }
      else{
        console.log("fail if ");
      }

      countNew=k;
    

      
    }


     function getBillsHistoryFilters(tablePay){

      var bill_his_month=   $( "#bill_his_month" ).val();
      var bill_his_year=   $( "#bill_his_year" ).val();
      var bill_his_type=   $( "#bill_his_type" ).val();

      getBillsHistoryWithFiltersAjax(bill_his_month,bill_his_year,bill_his_type,tablePay);

      

     }


   $(document).ready(function() {

       var countNew=0;
       


       //initalize 2 data tables
       var payBillsTable=$('#pay_bills').DataTable({
           "order": [],
           "targets": 'no-sort',
            "bSort": false,
           "columnDefs": [{
               "targets": 'no-sort'
           }]
       });

       loadBillsFromDb(payBillsTable);
  
       //add search function+ add second data table
      /* $('#pay_report tfoot th').each(function() {
           var title = $(this).text();
           $(this).html('<input type="text" placeholder="Search ' + title + '" />');
       });
   */
   
   
       // DataTable
       var tablePay = $('#pay_report').DataTable({
         // "processing": true,
        //  "serverSide": true,
         // "ajax": "../dev/billsController.php"
          dom: 'B<"clear">lfrtip',
        buttons: [ 'copy', 'csv', 'excel' ]

       });



      getBillsHistoryFilters(tablePay);
      //***********************************************************************

       $('#saveAllBills').on('click', function() {
         if (confirm("Do you want to save all this bills ? ")==1){
                  saveAllBills();
                  window.location.reload(true);

         }
       });
       //add new row
   
       initPages('pay_bills', 10);

       $('#search_bills').on('click', function() {

        getBillsHistoryFilters(tablePay);
       });


   //export to excel
       $("#export").click(function(tablePay) {

    


        if(confirm("Are you sure you want to download excel?")==1)
        {

          //$(tablePay.table().body()).
       $("#pay_report").table2excel({
          filename: "Homies_bills_report",
         name: "Worksheet Name",  
     });
        }
   });

      

})
// end of document.ready

   

   
