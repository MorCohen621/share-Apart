
  /*************************Recipe Search *************************/

  function wordValidator(string){
    
    if (typeof string !== 'undefined' && string!=='' && string!==null){
        var reg= /^[a-z][a-z\s]*$/;
        var test= reg.test(string);
        if (test){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function renderData(data){
                  $('#gif').hide(); 
        $( ".result_container" ).empty(); // remove all prev search

               if (typeof data != 'undefined' && JSON.parse(data)["count"]!=0){
          $(".has_results").addClass("result_container");
           var obj= JSON.parse(data);
           var hits=obj["hits"];
           var hits_amount=obj["to"];
           var default_url="./img/default.jpg";
              for (i = 0; i <hits_amount; i++) { 
                    var recipe_info=hits[i]["recipe"];
                    var name= recipe_info["label"];
                    var calories= recipe_info["calories"];
                    calories=Math.round(calories * 100) / 100;
                    var tags= recipe_info["healthLabels"].toString();  // dietLabels 
                    var recipe_url=recipe_info["url"];
                    var img_url=recipe_info["image"];
                    var ingredients_arr=JSON.stringify(recipe_info["ingredients"]);  //ingredientLines
                    // generate row html 
                    var temp_row=createRecipeRow(name,calories,tags,ingredients_arr,recipe_url,i);
                    $( ".result_container" ).append(temp_row );
                    $("#img_"+i )
                        .on( "error",function() { $( this ).attr( "src", default_url );})
                        .attr( "src", img_url );

               } // end for loop 

          var all_rows=$(".recipe-row");
          all_rows.css('padding-top','2%');
          //all_rows.css('background-image','url("./img/background-recipes.jpg")');
          all_rows.css('border-bottom','1px solid purple');
        } // end if

        else{
          $(".has_results").removeClass("result_container");
          alert("this name of recipe is invalid");
        }

      $(".glyphicon-plus").on( 'click', function(){
      if(confirm("do you want to add this recipe to shopping list?")==1){
      var json=$(this).parent().parent().parent().find('[id^=json_data_]')[0]['innerText'];
      saveRecipeIngredient(json);
      //need to check if sent all data correctly

      var ok_msg='<div class="alert alert-success alert-dismissable">';
      ok_msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      ok_msg+='Success! Ingrediants Added Successfuly to grocery list!';
      ok_msg+='</div>';
      $(this).removeClass('glyphicon-plus');
      $(this).addClass('glyphicon-ok');
      
      $('.customized_alert').html(ok_msg);
     $('.customized_alert').css("display","block");
     $(this).unbind( "click" );
   }
     });


   return true;
};


  function appendImage(image_url){

  var default_url="./img/default.jpg";

  var image_src="";

  }

    function searchRecipe(searchQuery){
        console.log(searchQuery);

      if (wordValidator(searchQuery)){
        var searchQueryLowCase= searchQuery.toLowerCase();
        searchQueryLowCase = searchQueryLowCase.replace(/ +(?= )/g,'');
        searchQueryLowCase = searchQueryLowCase.split(' ').join('+');
        getLiveData(searchQueryLowCase);
      }
      else{
      var alert_msg='<div class="alert alert-warning alert-dismissable">';
      alert_msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      alert_msg+='Alert! You can enter english characters only';
      alert_msg+='</div>';
      $('.customized_alert').html(alert_msg);
     $('.customized_alert').css("display","block");
      }    
  }



  function createRecipeRow(name,calories,tags,ingredients_arr,recipe_url,id){ //create html

    /* get data of row and create new html row*/



    var row_html='<div class="row recipe-row">';


  
    /* plus col*/

    var col_1='<div class="circle-container col-md-1"><br><div class="circle-green">';
    col_1= col_1+' <span class="glyphicon glyphicon-plus glyphicon-plus-custom1" data-toggle="tooltip" data-placement="top" title="Add to shopping list"> </span>';
    col_1= col_1+ '<img class="cart" src="img/cart.png" alt="add_to">';


    col_1= col_1+'</div></div>';


    /* picture col*/ 

    var col_2='<div class="col-md-2">';

    col_2=col_2+'<a target="_blank"> <img id="img_'+id+'" src=""   class="img-responsive img-rounded" alt="" style="width:75%;height:auto;"></a>';

    col_2=col_2+'</div>';




      /* info col*/

     var col_3='<div class="col-md-6" id="info_col">';

     col_3=col_3+'<span> <b>Name:</b> </span><span> '+name+' </span><br><br>';

     col_3=col_3+'<span> <b> Calories: </b> </span> <span> '+calories+' </span><br><br>';

     col_3=col_3+'<span> <b> Tags: </b> </span><span> '+tags+' </span> <br>';

     col_3=col_3+'</div>';

   /* ingrediants col*/
     var col_4='<div id="json_'+id+'" class="hidden">';

     col_4=col_4+'<span id="json_data_'+id+'" class="hidden"> '+ingredients_arr+' </span>';

     col_4=col_4+'</div>';


      /* see recipe col*/

    var col_5='<div class="see_recipe">';

    col_5= col_5+' <a  href="'+recipe_url+'" target="_blank> <button type="button" class="btn btn-info recipe ">See Recipe</button></a>';

    col_5= col_5+'</div></div>';
                    

     row_html=row_html+col_1+col_2+col_3+col_4+col_5+'</div>' ;                           

     

     return row_html;                                           

  };


  /****************************************************************/



  function isFirstTab(){

    var first_tab=$("#myTabs").find("a").attr("aria-expanded");
    if (first_tab){ return 1;}
    else { return 0; }

    }
    function deleteMe(name) {
    var row= $("."+name).parent();
    row.remove();
   var first_td_class=$("#grocery_list").find('td')[0]['className'];
   if (first_td_class=='dataTables_empty'){
     $('.dataTables_empty').css('display','');
   }}

     function createGroceryListRow(rowData){

      $('.dataTables_empty').css('display','none');
      var rows = document.getElementById('grocery_list').rows.length;
      countNew ++;
      ingrediant=rowData['ingrediantname'];
      parsedIng=ingrediant.replace(/ *\([^)]*\) */g, "");
      var rowTB1 =

              "<tr data-type='new' class='row"+rows+"'>" +
                  '<td class="sorting_'+countNew+'"> <input id="sorting_'+countNew+'" type="text" name="item" value="'+parsedIng+'"> </td>'+
                  '<td class="amount_'+countNew+'"> <input id="amount_'+countNew+'" type="number" name="amount" value="'+rowData['amount']+'" steps="10" min="1"> </td>'+
                  '<td class="unit_'+countNew+'"> <select id="unit_'+countNew+'"  name="amount">'+
                  '<option value="Unit"> Unit</option>'+                  
                  '<option value="Gram"> Gram</option>'+
                  '</select>'+
                  '</td>'+
                  '<td id="delete" class="delete_'+countNew+'" onClick="deleteMe(\'delete_'+countNew+' \')">  <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button> </td>'+
              '</tr>';

      $('#grocery_list').prepend(rowTB1);      
      //$('#grocery_list').prepend(rowTB1);
      $("#unit_"+countNew).val(rowData['unit']);
  }

    function renderDataFromDb(){
      var groupId='1';
      var groceryList= loadGroceryListFromDb(groupId);
    }

   function validateAllRows(){ // validations if data in table is empty.
      var input_array= $("#grocery_list_wrapper tbody input");

      var valid=true;

      for(var j=0;j<input_array.length;j++ ){

        var id = input_array[j]["id"];
        var value=input_array[j]["value"];

        if (typeof value == 'undefined' || value=="" || value==null){
          valid=false;
           console.log(input_array[j]["id"]+"is empty");
          
          $("#"+id).css("border", "2px solid red");
        }else{
          $("#"+id).css("border", "");
        }
      }
      if (!valid){ alert("please fill all the data");}
       return valid;
    }

   function saveAllRows(){

     var flag=validateAllRows();
     if(flag){

               var input_array= $("#grocery_list_wrapper tbody input");
               var select_array= $("#grocery_list tbody select");


               var length= input_array.length;
               console.log(length);
              var allTableInfo={};
              for(var j=0;j<length;j+=2 ){
                   var row=parseInt(j/2);
                    input_array[j+1]; 


                   allTableInfo[row]={'ingrediantname' : input_array[j]["value"], 
                                     'amount':input_array[j+1]["value"],
                                     'unit':select_array[row]["value"]
                                      };
              }
            var data_to_save_encoded=JSON.stringify(allTableInfo);          
            var groupId="1"; 
            saveGroceryListToDb(data_to_save_encoded,groupId);

    }
    else{
      return false;
      }
  }




var countNew = 0;

$(document).ready(function() {


  /*************************Recipe Search *************************/

  var has_results=0;

  $(".search-btn").on( 'click', function(){

     var search_string=$('#Search').val();

     $('#gif').show();

      searchRecipe(search_string);

 
  });


  /****************************************************************/

  $('#grocery_list').DataTable(
    {

    "order": [],
    "fnDrawCallback": function( oSettings ) { renderDataFromDb();},
    "paging": false,
    "scrollCollapse": true,
     "searching": false,
    "columnDefs": [{
    "targets": "_all",
    "orderable": false,
    }]
  });
  

   //debugger;

  // initPages('grocery_list',10);
   $('#addRow').on('click', function (e) {

        //t.row.add( [ ] ).draw( false );
        //prevent more clicking

        e.preventDefault();

        // hide no data div
         var emptyrow=[];
         emptyrow['ingrediantname']="";
         emptyrow['amount']="1";
          emptyrow['unit']=  "Unit";
       //  emptyrow['unit']="";
         createGroceryListRow(emptyrow);
           // pages = pager1.getPages();
          //  refreshPapers(1);
     } );


   $('#saveAllRows').on('click', function (e) {
if(confirm("do you want to save grocery list?")){      saveAllRows();
      saveAllRows();

}
    })
 })//end of document ready

