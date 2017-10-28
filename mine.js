var arr_five_cell=new Array();
var count=0;
var BaseRecord=(function() {
   $(document).ready(function() {
      var five_cell="", five_row="";
      for(var i=1; i<=25; ++i) {
         five_cell+='<div class="five_cell"></div>';
         if(!(i%5)) {
            five_row+='<div class="five_row">'+five_cell+'</div>';
            five_cell="";
         }
      }
      $(".container_five").html(five_row);
      arr_five_cell=document.body.getElementsByClassName("five_cell");
      $(".container_five").on("click", ".five_cell", function(){BaseRecord.click($.inArray(this, arr_five_cell));});
      $(".container_click").html(count);
      $(".container_click").css("color", "blue");
      BaseRecord.reset();
   });
   return {
      click:function(number_click) {
          var ajaxSettings={
             method:"post",
             url:"controller.php",
             data:"hook=click&number="+number_click,
             success:function(data) {
                $(".five_cell").css("background-color", "silver");
                var json_data=JSON.parse(data);
                var count_won=0;
                for(var i in json_data) {
                   $(arr_five_cell[json_data[i]]).css("background-color", "gold");
                   count_won++;
                }
                if(count_won==25) {
                   $(".container_click").html(count+" You won!");
                   $(".container_click").css("color", "red");
                   $(".container_five").on("click", ".five_cell", function(){$(".container_click").html(""); location.reload();});
                }
             }
          };
          $.ajax(ajaxSettings);
          count++;
          $(".container_click").html(count);
      },
      reset:function() {
          var ajaxSettings={
             method:"post",
             url:"controller.php",
             data:"hook=reset",
             success:function(data) {
                //...
             }
          };
          $.ajax(ajaxSettings);
      },
   };
})();
