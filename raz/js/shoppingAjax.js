


function getLiveData(searchQuery){
    var url='http://ilayel.mtacloud.co.il/homies/dev/recipeController.php';

    $.post(url,
    {
        "searchQuery": searchQuery,
        "requestType": "getRecipe"
    },
    function(data, status){
        $('#gif').hide(); 
        renderData(data);

    });
  }
function loadGroceryListFromDb(groupId){
    var url='http://ilayel.mtacloud.co.il/homies/dev/recipeController.php';

    $.post(url,
    {
        "groupId":groupId,
        "requestType": "loadGroceryList"
    },
    function(data, status){

        console.log("loadGroceryListFromDb is good");
        //console.log(data);
        debugger;

        if (typeof data != 'undefined' && data!="" )
        {

        var groceryListArray=JSON.parse(data);

      for (i = 0; i < groceryListArray.length; i++){
        createGroceryListRow(groceryListArray[i]);
      }
      }
      else{
        console.log("no data to show");
      }
    //  pages = pager1.getPages();
      //refreshPapers(1);
        //console.log(data);
    });


  }


    function saveGroceryListToDb(jsonData,groupId){
    var url='http://ilayel.mtacloud.co.il/homies/dev/recipeController.php';
     console.log("groupid:"+groupId) ; 
    $.post(url,
    {
        "jsonData": jsonData,
        "groupId":groupId,
        "requestType": "saveGroceryListToDb"
    },
    function(data, status){
      var save_msg='<div class="alert alert-success alert-dismissable ">';
      save_msg+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      save_msg+='Success! your shopping list is saved';
      save_msg+='</div>';
      
      $('.saved_alert').html(save_msg);
     $('.saved_alert').css("display","block");

     
      $( ".close" ).click(function() {
              window.location.reload();
      });


     });

    };
  


  function saveRecipeIngredient(jsonData){
    var url='http://ilayel.mtacloud.co.il/homies/dev/recipeController.php';

    $.post(url,
    {
        "jsonData": jsonData,
        "requestType": "saveRecipeIngredient"
    },
    function(data, status){

        console.log(data);
    });
  }


function getData(searchQuery){
	var data= 
{
  "q" : "chicken",
  "from" : 0,
  "to" : 3,
  "params" : {
    "sane" : [ ],
    "q" : [ "chicken" ],
    "app_key" : [ "f28262fcbfa7c3c5b03f88a6b3f63ff5" ],
    "health" : [ "alcohol-free" ],
    "from" : [ "0" ],
    "to" : [ "3" ],
    "calories" : [ "591-722" ],
    "app_id" : [ "5a64d398" ]
  },
  "more" : true,
  "count" : 14936,
  "hits" : [ {
    "recipe" : {
      "uri" : "http://www.edamam.com/ontologies/edamam.owl#recipe_3da1169eb633a5e4607890ebf7dee89f",
      "label" : "Grilled Butterflied Chicken Recipe",
      "image" : "https://www.edamam.com/web-img/7a2/7a2f41a7891e8a8f8a087a96930c6463.jpg",
      "source" : "Serious Eats",
      "url" : "http://www.seriouseats.com/recipes/2012/08/grilled-butterflied-chicken-recipe.html",
      "shareAs" : "http://www.edamam.com/recipe/grilled-butterflied-chicken-recipe-3da1169eb633a5e4607890ebf7dee89f/chicken/alcohol-free/591-722-cal",
      "yield" : 4.0,
      "dietLabels" : [ "Low-Carb" ],
      "healthLabels" : [ "Sugar-Conscious", "Peanut-Free", "Tree-Nut-Free", "Alcohol-Free" ],
      "cautions" : [ ],
      "ingredientLines" : [ "1 whole chicken, 3 1/2 to 4 pounds", "Kosher salt and freshly ground black pepper" ],
      "ingredients" : [ {
        "text" : "1 whole chicken, 3 1/2 to 4 pounds",
        "weight" : 1700.9713875
      }, {
        "text" : "Kosher salt and freshly ground black pepper",
        "weight" : 10.205828325
      }, {
        "text" : "Kosher salt and freshly ground black pepper",
        "weight" : 5.1029141625
      } ],
      "calories" : 2499.628483072875,
      "totalWeight" : 1714.2190942311247,
      "totalTime" : 60.0,
      "totalNutrients" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 2499.628483072875,
          "unit" : "kcal"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 174.35943285279748,
          "unit" : "g"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 49.92310198999199,
          "unit" : "g"
        },
        "FATRN" : {
          "label" : "Trans",
          "quantity" : 1.121960727195,
          "unit" : "g"
        },
        "FAMS" : {
          "label" : "Monounsaturated",
          "quantity" : 72.21332845006087,
          "unit" : "g"
        },
        "FAPU" : {
          "label" : "Polyunsaturated",
          "quantity" : 37.41106263839175,
          "unit" : "g"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 3.2633136069187505,
          "unit" : "g"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 1.2910372831125,
          "unit" : "g"
        },
        "SUGAR" : {
          "label" : "Sugars",
          "quantity" : 0.03265865064,
          "unit" : "g"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 215.66905387248374,
          "unit" : "g"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 867.495407625,
          "unit" : "mg"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 3967.4416670301102,
          "unit" : "mg"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 151.79331974134493,
          "unit" : "mg"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 240.13953984356124,
          "unit" : "mg"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 2254.557739840115,
          "unit" : "mg"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 10.932315672155212,
          "unit" : "mg"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 15.221122590952376,
          "unit" : "mg"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 1708.35360332175,
          "unit" : "mg"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 475.60860965887497,
          "unit" : "µg"
        },
        "VITC" : {
          "label" : "Vitamin C",
          "quantity" : 18.506568696,
          "unit" : "mg"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 0.6995074733954999,
          "unit" : "mg"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 1.3971778976925,
          "unit" : "mg"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 78.72280987231237,
          "unit" : "mg"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 4.063161382462875,
          "unit" : "mg"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 70.267128017625,
          "unit" : "µg"
        },
        "FOLFD" : {
          "label" : "Folate (food)",
          "quantity" : 70.267128017625,
          "unit" : "µg"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 3.58564768485,
          "unit" : "µg"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 2.313321087,
          "unit" : "µg"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 3.52305193779,
          "unit" : "mg"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 25.703378636512497,
          "unit" : "µg"
        }
      },
      "totalDaily" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 124.98142415364374,
          "unit" : "%"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 268.2452813119961,
          "unit" : "%"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 249.61550994995997,
          "unit" : "%"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 1.08777120230625,
          "unit" : "%"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 5.164149132450001,
          "unit" : "%"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 431.3381077449675,
          "unit" : "%"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 289.165135875,
          "unit" : "%"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 165.31006945958794,
          "unit" : "%"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 15.179331974134493,
          "unit" : "%"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 60.03488496089031,
          "unit" : "%"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 64.4159354240033,
          "unit" : "%"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 60.73508706752895,
          "unit" : "%"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 101.47415060634918,
          "unit" : "%"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 244.05051476024997,
          "unit" : "%"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 52.845401073208336,
          "unit" : "%"
        },
        "VITC" : {
          "label" : "Vitamin C",
          "quantity" : 30.844281159999998,
          "unit" : "%"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 46.63383155969999,
          "unit" : "%"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 82.18693515838235,
          "unit" : "%"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 393.6140493615618,
          "unit" : "%"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 203.15806912314375,
          "unit" : "%"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 17.56678200440625,
          "unit" : "%"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 59.7607947475,
          "unit" : "%"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 0.57833027175,
          "unit" : "%"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 17.615259688949997,
          "unit" : "%"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 32.12922329564062,
          "unit" : "%"
        }
      },
      "digest" : [ {
        "label" : "Fat",
        "tag" : "FAT",
        "schemaOrgTag" : "fatContent",
        "total" : 174.35943285279748,
        "hasRDI" : true,
        "daily" : 268.2452813119961,
        "unit" : "g",
        "sub" : [ {
          "label" : "Saturated",
          "tag" : "FASAT",
          "schemaOrgTag" : "saturatedFatContent",
          "total" : 49.92310198999199,
          "hasRDI" : true,
          "daily" : 249.61550994995997,
          "unit" : "g"
        }, {
          "label" : "Trans",
          "tag" : "FATRN",
          "schemaOrgTag" : "transFatContent",
          "total" : 1.121960727195,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Monounsaturated",
          "tag" : "FAMS",
          "schemaOrgTag" : null,
          "total" : 72.21332845006087,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Polyunsaturated",
          "tag" : "FAPU",
          "schemaOrgTag" : null,
          "total" : 37.41106263839175,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Carbs",
        "tag" : "CHOCDF",
        "schemaOrgTag" : "carbohydrateContent",
        "total" : 3.2633136069187505,
        "hasRDI" : true,
        "daily" : 1.08777120230625,
        "unit" : "g",
        "sub" : [ {
          "label" : "Carbs (net)",
          "tag" : "CHOCDF.net",
          "schemaOrgTag" : null,
          "total" : 1.9722763238062504,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Fiber",
          "tag" : "FIBTG",
          "schemaOrgTag" : "fiberContent",
          "total" : 1.2910372831125,
          "hasRDI" : true,
          "daily" : 5.164149132450001,
          "unit" : "g"
        }, {
          "label" : "Sugars",
          "tag" : "SUGAR",
          "schemaOrgTag" : "sugarContent",
          "total" : 0.03265865064,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Sugars, added",
          "tag" : "SUGAR.added",
          "schemaOrgTag" : null,
          "total" : 0.0,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Protein",
        "tag" : "PROCNT",
        "schemaOrgTag" : "proteinContent",
        "total" : 215.66905387248374,
        "hasRDI" : true,
        "daily" : 431.3381077449675,
        "unit" : "g"
      }, {
        "label" : "Cholesterol",
        "tag" : "CHOLE",
        "schemaOrgTag" : "cholesterolContent",
        "total" : 867.495407625,
        "hasRDI" : true,
        "daily" : 289.165135875,
        "unit" : "mg"
      }, {
        "label" : "Sodium",
        "tag" : "NA",
        "schemaOrgTag" : "sodiumContent",
        "total" : 3967.4416670301102,
        "hasRDI" : true,
        "daily" : 165.31006945958794,
        "unit" : "mg"
      }, {
        "label" : "Calcium",
        "tag" : "CA",
        "schemaOrgTag" : null,
        "total" : 151.79331974134493,
        "hasRDI" : true,
        "daily" : 15.179331974134493,
        "unit" : "mg"
      }, {
        "label" : "Magnesium",
        "tag" : "MG",
        "schemaOrgTag" : null,
        "total" : 240.13953984356124,
        "hasRDI" : true,
        "daily" : 60.03488496089031,
        "unit" : "mg"
      }, {
        "label" : "Potassium",
        "tag" : "K",
        "schemaOrgTag" : null,
        "total" : 2254.557739840115,
        "hasRDI" : true,
        "daily" : 64.4159354240033,
        "unit" : "mg"
      }, {
        "label" : "Iron",
        "tag" : "FE",
        "schemaOrgTag" : null,
        "total" : 10.932315672155212,
        "hasRDI" : true,
        "daily" : 60.73508706752895,
        "unit" : "mg"
      }, {
        "label" : "Zinc",
        "tag" : "ZN",
        "schemaOrgTag" : null,
        "total" : 15.221122590952376,
        "hasRDI" : true,
        "daily" : 101.47415060634918,
        "unit" : "mg"
      }, {
        "label" : "Phosphorus",
        "tag" : "P",
        "schemaOrgTag" : null,
        "total" : 1708.35360332175,
        "hasRDI" : true,
        "daily" : 244.05051476024997,
        "unit" : "mg"
      }, {
        "label" : "Vitamin A",
        "tag" : "VITA_RAE",
        "schemaOrgTag" : null,
        "total" : 475.60860965887497,
        "hasRDI" : true,
        "daily" : 52.845401073208336,
        "unit" : "µg"
      }, {
        "label" : "Vitamin C",
        "tag" : "VITC",
        "schemaOrgTag" : null,
        "total" : 18.506568696,
        "hasRDI" : true,
        "daily" : 30.844281159999998,
        "unit" : "mg"
      }, {
        "label" : "Thiamin (B1)",
        "tag" : "THIA",
        "schemaOrgTag" : null,
        "total" : 0.6995074733954999,
        "hasRDI" : true,
        "daily" : 46.63383155969999,
        "unit" : "mg"
      }, {
        "label" : "Riboflavin (B2)",
        "tag" : "RIBF",
        "schemaOrgTag" : null,
        "total" : 1.3971778976925,
        "hasRDI" : true,
        "daily" : 82.18693515838235,
        "unit" : "mg"
      }, {
        "label" : "Niacin (B3)",
        "tag" : "NIA",
        "schemaOrgTag" : null,
        "total" : 78.72280987231237,
        "hasRDI" : true,
        "daily" : 393.6140493615618,
        "unit" : "mg"
      }, {
        "label" : "Vitamin B6",
        "tag" : "VITB6A",
        "schemaOrgTag" : null,
        "total" : 4.063161382462875,
        "hasRDI" : true,
        "daily" : 203.15806912314375,
        "unit" : "mg"
      }, {
        "label" : "Folate equivalent (total)",
        "tag" : "FOLDFE",
        "schemaOrgTag" : null,
        "total" : 70.267128017625,
        "hasRDI" : true,
        "daily" : 17.56678200440625,
        "unit" : "µg"
      }, {
        "label" : "Folate (food)",
        "tag" : "FOLFD",
        "schemaOrgTag" : null,
        "total" : 70.267128017625,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Folic acid",
        "tag" : "FOLAC",
        "schemaOrgTag" : null,
        "total" : 0.0,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Vitamin B12",
        "tag" : "VITB12",
        "schemaOrgTag" : null,
        "total" : 3.58564768485,
        "hasRDI" : true,
        "daily" : 59.7607947475,
        "unit" : "µg"
      }, {
        "label" : "Vitamin D",
        "tag" : "VITD",
        "schemaOrgTag" : null,
        "total" : 2.313321087,
        "hasRDI" : true,
        "daily" : 0.57833027175,
        "unit" : "µg"
      }, {
        "label" : "Vitamin E",
        "tag" : "TOCPHA",
        "schemaOrgTag" : null,
        "total" : 3.52305193779,
        "hasRDI" : true,
        "daily" : 17.615259688949997,
        "unit" : "mg"
      }, {
        "label" : "Vitamin K",
        "tag" : "VITK1",
        "schemaOrgTag" : null,
        "total" : 25.703378636512497,
        "hasRDI" : true,
        "daily" : 32.12922329564062,
        "unit" : "µg"
      } ]
    },
    "bookmarked" : false,
    "bought" : false
  }, {
    "recipe" : {
      "uri" : "http://www.edamam.com/ontologies/edamam.owl#recipe_6289468ceb188ec8103d4a0c4adab6b8",
      "label" : "Oven-Roasted Chicken Thighs",
      "image" : "https://www.edamam.com/web-img/676/676a9be0cb7bc68b41ccc0ca765969ed.jpg",
      "source" : "Leite's Culinaria",
      "url" : "http://leitesculinaria.com/97461/recipes-oven-roasted-chicken-thighs.html",
      "shareAs" : "http://www.edamam.com/recipe/oven-roasted-chicken-thighs-6289468ceb188ec8103d4a0c4adab6b8/chicken/alcohol-free/591-722-cal",
      "yield" : 4.0,
      "dietLabels" : [ "Low-Carb" ],
      "healthLabels" : [ "Sugar-Conscious", "Peanut-Free", "Tree-Nut-Free", "Alcohol-Free" ],
      "cautions" : [ ],
      "ingredientLines" : [ "8 bone-in, skin-on chicken thighs (6 to 8 ounces each)", "1 1/4 teaspoons sea salt", "Freshly ground black pepper", "Mild olive oil" ],
      "ingredients" : [ {
        "text" : "8 bone-in, skin-on chicken thighs (6 to 8 ounces each)",
        "weight" : 1587.5732950000001
      }, {
        "text" : "1 1/4 teaspoons sea salt",
        "weight" : 6.067708333333334
      }, {
        "text" : "Freshly ground black pepper",
        "weight" : 4.78092301
      }, {
        "text" : "Mild olive oil",
        "weight" : 21.673517645333334
      } ],
      "calories" : 2659.569900104847,
      "totalWeight" : 1620.0954439886666,
      "totalTime" : 0.0,
      "totalNutrients" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 2659.569900104847,
          "unit" : "kcal"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 206.41652274510935,
          "unit" : "g"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 53.33450087082684,
          "unit" : "g"
        },
        "FATRN" : {
          "label" : "Trans",
          "quantity" : 0.9446061105250001,
          "unit" : "g"
        },
        "FAMS" : {
          "label" : "Monounsaturated",
          "quantity" : 92.97285690135556,
          "unit" : "g"
        },
        "FAPU" : {
          "label" : "Polyunsaturated",
          "quantity" : 40.85723416981323,
          "unit" : "g"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 5.835653531145001,
          "unit" : "g"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 1.20957352153,
          "unit" : "g"
        },
        "SUGAR" : {
          "label" : "Sugars",
          "quantity" : 0.030597907264000003,
          "unit" : "g"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 184.083713734539,
          "unit" : "g"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 1089.07528037,
          "unit" : "mg"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 3253.26610905324,
          "unit" : "mg"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 100.64356556575332,
          "unit" : "mg"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 208.27029060043336,
          "unit" : "mg"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 2331.2952839060204,
          "unit" : "mg"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 8.162471644784867,
          "unit" : "mg"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 14.398747546002335,
          "unit" : "mg"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 1752.2969095608,
          "unit" : "mg"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 256.8901497077,
          "unit" : "µg"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 0.8164133505958,
          "unit" : "mg"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 1.619992555843,
          "unit" : "mg"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 51.4523313756293,
          "unit" : "mg"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 3.8701280195141,
          "unit" : "mg"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 34.1517961067,
          "unit" : "µg"
        },
        "FOLFD" : {
          "label" : "Folate (food)",
          "quantity" : 34.1517961067,
          "unit" : "µg"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 6.890068100300001,
          "unit" : "µg"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 1.1113013065000001,
          "unit" : "µg"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 5.493604125059333,
          "unit" : "mg"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 44.21115602636067,
          "unit" : "µg"
        }
      },
      "totalDaily" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 132.97849500524237,
          "unit" : "%"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 317.5638811463221,
          "unit" : "%"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 266.67250435413416,
          "unit" : "%"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 1.9452178437150003,
          "unit" : "%"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 4.83829408612,
          "unit" : "%"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 368.167427469078,
          "unit" : "%"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 363.02509345666664,
          "unit" : "%"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 135.552754543885,
          "unit" : "%"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 10.064356556575332,
          "unit" : "%"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 52.06757265010834,
          "unit" : "%"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 66.60843668302915,
          "unit" : "%"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 45.347064693249266,
          "unit" : "%"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 95.99165030668223,
          "unit" : "%"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 250.32812993725716,
          "unit" : "%"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 28.54334996752222,
          "unit" : "%"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 54.42755670638667,
          "unit" : "%"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 95.29367975547058,
          "unit" : "%"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 257.2616568781465,
          "unit" : "%"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 193.506400975705,
          "unit" : "%"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 8.537949026675,
          "unit" : "%"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 114.83446833833335,
          "unit" : "%"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 0.27782532662500004,
          "unit" : "%"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 27.468020625296663,
          "unit" : "%"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 55.263945032950836,
          "unit" : "%"
        }
      },
      "digest" : [ {
        "label" : "Fat",
        "tag" : "FAT",
        "schemaOrgTag" : "fatContent",
        "total" : 206.41652274510935,
        "hasRDI" : true,
        "daily" : 317.5638811463221,
        "unit" : "g",
        "sub" : [ {
          "label" : "Saturated",
          "tag" : "FASAT",
          "schemaOrgTag" : "saturatedFatContent",
          "total" : 53.33450087082684,
          "hasRDI" : true,
          "daily" : 266.67250435413416,
          "unit" : "g"
        }, {
          "label" : "Trans",
          "tag" : "FATRN",
          "schemaOrgTag" : "transFatContent",
          "total" : 0.9446061105250001,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Monounsaturated",
          "tag" : "FAMS",
          "schemaOrgTag" : null,
          "total" : 92.97285690135556,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Polyunsaturated",
          "tag" : "FAPU",
          "schemaOrgTag" : null,
          "total" : 40.85723416981323,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Carbs",
        "tag" : "CHOCDF",
        "schemaOrgTag" : "carbohydrateContent",
        "total" : 5.835653531145001,
        "hasRDI" : true,
        "daily" : 1.9452178437150003,
        "unit" : "g",
        "sub" : [ {
          "label" : "Carbs (net)",
          "tag" : "CHOCDF.net",
          "schemaOrgTag" : null,
          "total" : 4.626080009615,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Fiber",
          "tag" : "FIBTG",
          "schemaOrgTag" : "fiberContent",
          "total" : 1.20957352153,
          "hasRDI" : true,
          "daily" : 4.83829408612,
          "unit" : "g"
        }, {
          "label" : "Sugars",
          "tag" : "SUGAR",
          "schemaOrgTag" : "sugarContent",
          "total" : 0.030597907264000003,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Sugars, added",
          "tag" : "SUGAR.added",
          "schemaOrgTag" : null,
          "total" : 0.0,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Protein",
        "tag" : "PROCNT",
        "schemaOrgTag" : "proteinContent",
        "total" : 184.083713734539,
        "hasRDI" : true,
        "daily" : 368.167427469078,
        "unit" : "g"
      }, {
        "label" : "Cholesterol",
        "tag" : "CHOLE",
        "schemaOrgTag" : "cholesterolContent",
        "total" : 1089.07528037,
        "hasRDI" : true,
        "daily" : 363.02509345666664,
        "unit" : "mg"
      }, {
        "label" : "Sodium",
        "tag" : "NA",
        "schemaOrgTag" : "sodiumContent",
        "total" : 3253.26610905324,
        "hasRDI" : true,
        "daily" : 135.552754543885,
        "unit" : "mg"
      }, {
        "label" : "Calcium",
        "tag" : "CA",
        "schemaOrgTag" : null,
        "total" : 100.64356556575332,
        "hasRDI" : true,
        "daily" : 10.064356556575332,
        "unit" : "mg"
      }, {
        "label" : "Magnesium",
        "tag" : "MG",
        "schemaOrgTag" : null,
        "total" : 208.27029060043336,
        "hasRDI" : true,
        "daily" : 52.06757265010834,
        "unit" : "mg"
      }, {
        "label" : "Potassium",
        "tag" : "K",
        "schemaOrgTag" : null,
        "total" : 2331.2952839060204,
        "hasRDI" : true,
        "daily" : 66.60843668302915,
        "unit" : "mg"
      }, {
        "label" : "Iron",
        "tag" : "FE",
        "schemaOrgTag" : null,
        "total" : 8.162471644784867,
        "hasRDI" : true,
        "daily" : 45.347064693249266,
        "unit" : "mg"
      }, {
        "label" : "Zinc",
        "tag" : "ZN",
        "schemaOrgTag" : null,
        "total" : 14.398747546002335,
        "hasRDI" : true,
        "daily" : 95.99165030668223,
        "unit" : "mg"
      }, {
        "label" : "Phosphorus",
        "tag" : "P",
        "schemaOrgTag" : null,
        "total" : 1752.2969095608,
        "hasRDI" : true,
        "daily" : 250.32812993725716,
        "unit" : "mg"
      }, {
        "label" : "Vitamin A",
        "tag" : "VITA_RAE",
        "schemaOrgTag" : null,
        "total" : 256.8901497077,
        "hasRDI" : true,
        "daily" : 28.54334996752222,
        "unit" : "µg"
      }, {
        "label" : "Vitamin C",
        "tag" : "VITC",
        "schemaOrgTag" : null,
        "total" : 0.0,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "mg"
      }, {
        "label" : "Thiamin (B1)",
        "tag" : "THIA",
        "schemaOrgTag" : null,
        "total" : 0.8164133505958,
        "hasRDI" : true,
        "daily" : 54.42755670638667,
        "unit" : "mg"
      }, {
        "label" : "Riboflavin (B2)",
        "tag" : "RIBF",
        "schemaOrgTag" : null,
        "total" : 1.619992555843,
        "hasRDI" : true,
        "daily" : 95.29367975547058,
        "unit" : "mg"
      }, {
        "label" : "Niacin (B3)",
        "tag" : "NIA",
        "schemaOrgTag" : null,
        "total" : 51.4523313756293,
        "hasRDI" : true,
        "daily" : 257.2616568781465,
        "unit" : "mg"
      }, {
        "label" : "Vitamin B6",
        "tag" : "VITB6A",
        "schemaOrgTag" : null,
        "total" : 3.8701280195141,
        "hasRDI" : true,
        "daily" : 193.506400975705,
        "unit" : "mg"
      }, {
        "label" : "Folate equivalent (total)",
        "tag" : "FOLDFE",
        "schemaOrgTag" : null,
        "total" : 34.1517961067,
        "hasRDI" : true,
        "daily" : 8.537949026675,
        "unit" : "µg"
      }, {
        "label" : "Folate (food)",
        "tag" : "FOLFD",
        "schemaOrgTag" : null,
        "total" : 34.1517961067,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Folic acid",
        "tag" : "FOLAC",
        "schemaOrgTag" : null,
        "total" : 0.0,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Vitamin B12",
        "tag" : "VITB12",
        "schemaOrgTag" : null,
        "total" : 6.890068100300001,
        "hasRDI" : true,
        "daily" : 114.83446833833335,
        "unit" : "µg"
      }, {
        "label" : "Vitamin D",
        "tag" : "VITD",
        "schemaOrgTag" : null,
        "total" : 1.1113013065000001,
        "hasRDI" : true,
        "daily" : 0.27782532662500004,
        "unit" : "µg"
      }, {
        "label" : "Vitamin E",
        "tag" : "TOCPHA",
        "schemaOrgTag" : null,
        "total" : 5.493604125059333,
        "hasRDI" : true,
        "daily" : 27.468020625296663,
        "unit" : "mg"
      }, {
        "label" : "Vitamin K",
        "tag" : "VITK1",
        "schemaOrgTag" : null,
        "total" : 44.21115602636067,
        "hasRDI" : true,
        "daily" : 55.263945032950836,
        "unit" : "µg"
      } ]
    },
    "bookmarked" : false,
    "bought" : false
  }, {
    "recipe" : {
      "uri" : "http://www.edamam.com/ontologies/edamam.owl#recipe_c9bc1ad59e36cd23aa74c07a22372ea3",
      "label" : "Citrus Roasted Chicken",
      "image" : "https://www.edamam.com/web-img/d4b/d4bb1e6c7a6c3738d8e01707eb0ad83d.jpg",
      "source" : "Food52",
      "url" : "https://food52.com/recipes/3403-citrus-roasted-chicken",
      "shareAs" : "http://www.edamam.com/recipe/citrus-roasted-chicken-c9bc1ad59e36cd23aa74c07a22372ea3/chicken/alcohol-free/591-722-cal",
      "yield" : 4.0,
      "dietLabels" : [ "Low-Carb" ],
      "healthLabels" : [ "Peanut-Free", "Tree-Nut-Free", "Alcohol-Free" ],
      "cautions" : [ ],
      "ingredientLines" : [ "1 chicken, about 3.5 to 4 pounds", "1 lemon", "1 blood orange", "1 tangerine or clementine", "Kosher salt", "1/2 cup chicken broth" ],
      "ingredients" : [ {
        "text" : "1 chicken, about 3.5 to 4 pounds",
        "weight" : 1700.9713875
      }, {
        "text" : "1 lemon",
        "weight" : 58.0
      }, {
        "text" : "1 blood orange",
        "weight" : 131.0
      }, {
        "text" : "1 tangerine or clementine",
        "weight" : 74.0
      }, {
        "text" : "Kosher salt",
        "weight" : 12.503828324999999
      }, {
        "text" : "1/2 cup chicken broth",
        "weight" : 120.0
      } ],
      "calories" : 2643.1901685250004,
      "totalWeight" : 2093.938546284647,
      "totalTime" : 424.0,
      "totalNutrients" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 2643.1901685250004,
          "unit" : "kcal"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 176.07527785109997,
          "unit" : "g"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 50.27953942484999,
          "unit" : "g"
        },
        "FATRN" : {
          "label" : "Trans",
          "quantity" : 1.121960727195,
          "unit" : "g"
        },
        "FAMS" : {
          "label" : "Monounsaturated",
          "quantity" : 72.91052791439999,
          "unit" : "g"
        },
        "FAPU" : {
          "label" : "Polyunsaturated",
          "quantity" : 37.70010555505,
          "unit" : "g"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 33.9289,
          "unit" : "g"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 6.026,
          "unit" : "g"
        },
        "SUGAR" : {
          "label" : "Sugars",
          "quantity" : 22.3877,
          "unit" : "g"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 220.661261091,
          "unit" : "g"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 871.095407625,
          "unit" : "mg"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 4846.2337822035,
          "unit" : "mg"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 222.90477789331527,
          "unit" : "mg"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 261.37178028784643,
          "unit" : "mg"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 2761.015799917772,
          "unit" : "mg"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 11.277436515489338,
          "unit" : "mg"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 15.501120278634646,
          "unit" : "mg"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 1775.850998945,
          "unit" : "mg"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 490.42082283499997,
          "unit" : "µg"
        },
        "VITC" : {
          "label" : "Vitamin C",
          "quantity" : 155.290568696,
          "unit" : "mg"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 0.9368063261,
          "unit" : "mg"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 1.5761926522,
          "unit" : "mg"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 81.46334356343502,
          "unit" : "mg"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 4.30201190225,
          "unit" : "mg"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 138.83963261,
          "unit" : "µg"
        },
        "FOLFD" : {
          "label" : "Folate (food)",
          "quantity" : 138.83963261,
          "unit" : "µg"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 3.58564768485,
          "unit" : "µg"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 2.313321087,
          "unit" : "µg"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 3.9767816305000006,
          "unit" : "mg"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 17.589908152499998,
          "unit" : "µg"
        }
      },
      "totalDaily" : {
        "ENERC_KCAL" : {
          "label" : "Energy",
          "quantity" : 132.15950842625003,
          "unit" : "%"
        },
        "FAT" : {
          "label" : "Fat",
          "quantity" : 270.8850428478461,
          "unit" : "%"
        },
        "FASAT" : {
          "label" : "Saturated",
          "quantity" : 251.39769712424996,
          "unit" : "%"
        },
        "CHOCDF" : {
          "label" : "Carbs",
          "quantity" : 11.309633333333332,
          "unit" : "%"
        },
        "FIBTG" : {
          "label" : "Fiber",
          "quantity" : 24.104,
          "unit" : "%"
        },
        "PROCNT" : {
          "label" : "Protein",
          "quantity" : 441.32252218200006,
          "unit" : "%"
        },
        "CHOLE" : {
          "label" : "Cholesterol",
          "quantity" : 290.36513587499996,
          "unit" : "%"
        },
        "NA" : {
          "label" : "Sodium",
          "quantity" : 201.92640759181248,
          "unit" : "%"
        },
        "CA" : {
          "label" : "Calcium",
          "quantity" : 22.290477789331526,
          "unit" : "%"
        },
        "MG" : {
          "label" : "Magnesium",
          "quantity" : 65.34294507196161,
          "unit" : "%"
        },
        "K" : {
          "label" : "Potassium",
          "quantity" : 78.88616571193634,
          "unit" : "%"
        },
        "FE" : {
          "label" : "Iron",
          "quantity" : 62.65242508605187,
          "unit" : "%"
        },
        "ZN" : {
          "label" : "Zinc",
          "quantity" : 103.3408018575643,
          "unit" : "%"
        },
        "P" : {
          "label" : "Phosphorus",
          "quantity" : 253.69299984928568,
          "unit" : "%"
        },
        "VITA_RAE" : {
          "label" : "Vitamin A",
          "quantity" : 54.49120253722222,
          "unit" : "%"
        },
        "VITC" : {
          "label" : "Vitamin C",
          "quantity" : 258.81761449333334,
          "unit" : "%"
        },
        "THIA" : {
          "label" : "Thiamin (B1)",
          "quantity" : 62.45375507333333,
          "unit" : "%"
        },
        "RIBF" : {
          "label" : "Riboflavin (B2)",
          "quantity" : 92.71721483529413,
          "unit" : "%"
        },
        "NIA" : {
          "label" : "Niacin (B3)",
          "quantity" : 407.3167178171751,
          "unit" : "%"
        },
        "VITB6A" : {
          "label" : "Vitamin B6",
          "quantity" : 215.1005951125,
          "unit" : "%"
        },
        "FOLDFE" : {
          "label" : "Folate equivalent (total)",
          "quantity" : 34.7099081525,
          "unit" : "%"
        },
        "VITB12" : {
          "label" : "Vitamin B12",
          "quantity" : 59.7607947475,
          "unit" : "%"
        },
        "VITD" : {
          "label" : "Vitamin D",
          "quantity" : 0.57833027175,
          "unit" : "%"
        },
        "TOCPHA" : {
          "label" : "Vitamin E",
          "quantity" : 19.883908152500005,
          "unit" : "%"
        },
        "VITK1" : {
          "label" : "Vitamin K",
          "quantity" : 21.987385190624998,
          "unit" : "%"
        }
      },
      "digest" : [ {
        "label" : "Fat",
        "tag" : "FAT",
        "schemaOrgTag" : "fatContent",
        "total" : 176.07527785109997,
        "hasRDI" : true,
        "daily" : 270.8850428478461,
        "unit" : "g",
        "sub" : [ {
          "label" : "Saturated",
          "tag" : "FASAT",
          "schemaOrgTag" : "saturatedFatContent",
          "total" : 50.27953942484999,
          "hasRDI" : true,
          "daily" : 251.39769712424996,
          "unit" : "g"
        }, {
          "label" : "Trans",
          "tag" : "FATRN",
          "schemaOrgTag" : "transFatContent",
          "total" : 1.121960727195,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Monounsaturated",
          "tag" : "FAMS",
          "schemaOrgTag" : null,
          "total" : 72.91052791439999,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Polyunsaturated",
          "tag" : "FAPU",
          "schemaOrgTag" : null,
          "total" : 37.70010555505,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Carbs",
        "tag" : "CHOCDF",
        "schemaOrgTag" : "carbohydrateContent",
        "total" : 33.9289,
        "hasRDI" : true,
        "daily" : 11.309633333333332,
        "unit" : "g",
        "sub" : [ {
          "label" : "Carbs (net)",
          "tag" : "CHOCDF.net",
          "schemaOrgTag" : null,
          "total" : 27.9029,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Fiber",
          "tag" : "FIBTG",
          "schemaOrgTag" : "fiberContent",
          "total" : 6.026,
          "hasRDI" : true,
          "daily" : 24.104,
          "unit" : "g"
        }, {
          "label" : "Sugars",
          "tag" : "SUGAR",
          "schemaOrgTag" : "sugarContent",
          "total" : 22.3877,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        }, {
          "label" : "Sugars, added",
          "tag" : "SUGAR.added",
          "schemaOrgTag" : null,
          "total" : 0.0,
          "hasRDI" : false,
          "daily" : 0.0,
          "unit" : "g"
        } ]
      }, {
        "label" : "Protein",
        "tag" : "PROCNT",
        "schemaOrgTag" : "proteinContent",
        "total" : 220.661261091,
        "hasRDI" : true,
        "daily" : 441.32252218200006,
        "unit" : "g"
      }, {
        "label" : "Cholesterol",
        "tag" : "CHOLE",
        "schemaOrgTag" : "cholesterolContent",
        "total" : 871.095407625,
        "hasRDI" : true,
        "daily" : 290.36513587499996,
        "unit" : "mg"
      }, {
        "label" : "Sodium",
        "tag" : "NA",
        "schemaOrgTag" : "sodiumContent",
        "total" : 4846.2337822035,
        "hasRDI" : true,
        "daily" : 201.92640759181248,
        "unit" : "mg"
      }, {
        "label" : "Calcium",
        "tag" : "CA",
        "schemaOrgTag" : null,
        "total" : 222.90477789331527,
        "hasRDI" : true,
        "daily" : 22.290477789331526,
        "unit" : "mg"
      }, {
        "label" : "Magnesium",
        "tag" : "MG",
        "schemaOrgTag" : null,
        "total" : 261.37178028784643,
        "hasRDI" : true,
        "daily" : 65.34294507196161,
        "unit" : "mg"
      }, {
        "label" : "Potassium",
        "tag" : "K",
        "schemaOrgTag" : null,
        "total" : 2761.015799917772,
        "hasRDI" : true,
        "daily" : 78.88616571193634,
        "unit" : "mg"
      }, {
        "label" : "Iron",
        "tag" : "FE",
        "schemaOrgTag" : null,
        "total" : 11.277436515489338,
        "hasRDI" : true,
        "daily" : 62.65242508605187,
        "unit" : "mg"
      }, {
        "label" : "Zinc",
        "tag" : "ZN",
        "schemaOrgTag" : null,
        "total" : 15.501120278634646,
        "hasRDI" : true,
        "daily" : 103.3408018575643,
        "unit" : "mg"
      }, {
        "label" : "Phosphorus",
        "tag" : "P",
        "schemaOrgTag" : null,
        "total" : 1775.850998945,
        "hasRDI" : true,
        "daily" : 253.69299984928568,
        "unit" : "mg"
      }, {
        "label" : "Vitamin A",
        "tag" : "VITA_RAE",
        "schemaOrgTag" : null,
        "total" : 490.42082283499997,
        "hasRDI" : true,
        "daily" : 54.49120253722222,
        "unit" : "µg"
      }, {
        "label" : "Vitamin C",
        "tag" : "VITC",
        "schemaOrgTag" : null,
        "total" : 155.290568696,
        "hasRDI" : true,
        "daily" : 258.81761449333334,
        "unit" : "mg"
      }, {
        "label" : "Thiamin (B1)",
        "tag" : "THIA",
        "schemaOrgTag" : null,
        "total" : 0.9368063261,
        "hasRDI" : true,
        "daily" : 62.45375507333333,
        "unit" : "mg"
      }, {
        "label" : "Riboflavin (B2)",
        "tag" : "RIBF",
        "schemaOrgTag" : null,
        "total" : 1.5761926522,
        "hasRDI" : true,
        "daily" : 92.71721483529413,
        "unit" : "mg"
      }, {
        "label" : "Niacin (B3)",
        "tag" : "NIA",
        "schemaOrgTag" : null,
        "total" : 81.46334356343502,
        "hasRDI" : true,
        "daily" : 407.3167178171751,
        "unit" : "mg"
      }, {
        "label" : "Vitamin B6",
        "tag" : "VITB6A",
        "schemaOrgTag" : null,
        "total" : 4.30201190225,
        "hasRDI" : true,
        "daily" : 215.1005951125,
        "unit" : "mg"
      }, {
        "label" : "Folate equivalent (total)",
        "tag" : "FOLDFE",
        "schemaOrgTag" : null,
        "total" : 138.83963261,
        "hasRDI" : true,
        "daily" : 34.7099081525,
        "unit" : "µg"
      }, {
        "label" : "Folate (food)",
        "tag" : "FOLFD",
        "schemaOrgTag" : null,
        "total" : 138.83963261,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Folic acid",
        "tag" : "FOLAC",
        "schemaOrgTag" : null,
        "total" : 0.0,
        "hasRDI" : false,
        "daily" : 0.0,
        "unit" : "µg"
      }, {
        "label" : "Vitamin B12",
        "tag" : "VITB12",
        "schemaOrgTag" : null,
        "total" : 3.58564768485,
        "hasRDI" : true,
        "daily" : 59.7607947475,
        "unit" : "µg"
      }, {
        "label" : "Vitamin D",
        "tag" : "VITD",
        "schemaOrgTag" : null,
        "total" : 2.313321087,
        "hasRDI" : true,
        "daily" : 0.57833027175,
        "unit" : "µg"
      }, {
        "label" : "Vitamin E",
        "tag" : "TOCPHA",
        "schemaOrgTag" : null,
        "total" : 3.9767816305000006,
        "hasRDI" : true,
        "daily" : 19.883908152500005,
        "unit" : "mg"
      }, {
        "label" : "Vitamin K",
        "tag" : "VITK1",
        "schemaOrgTag" : null,
        "total" : 17.589908152499998,
        "hasRDI" : true,
        "daily" : 21.987385190624998,
        "unit" : "µg"
      } ]
    },
    "bookmarked" : false,
    "bought" : false
  } ]
};
renderData(data);
return data;
};
