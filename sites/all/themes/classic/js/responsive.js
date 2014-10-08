jQuery(function($){
  $(document).ready(function(){
    
    //remove img height and width attributes for better responsiveness
    $('img').each(function(){
      $(this).removeAttr('width')
      $(this).removeAttr('height');
    });
    
    //responsive drop-down <== main nav
    $("<select />").appendTo("#navigation");
    $("<option />", {
       "selected": "selected",
       "value" : "",
       "text" : "Menu"
    }).appendTo("#navigation select");
    $("#navigation a").each(function() {
     var el = $(this);
     /* --- my customization --- */
     var hypen = '';
     var parents = $(el).parentsUntil("#navigation");
     for(var i = 0; i < parents.length; i++) {
       if(parents[i].tagName == 'UL') {var hypen = hypen + '-';}
     }
     /* --- my customization end --- */

     $("<option />", {
       "value"   : el.attr("href"),
       "text"    : hypen +' ' + el.text()
     }).appendTo("#navigation select");
    });
    
    //remove options with # symbol for value
    $("#navigation option").each(function() {
      var navOption = $(this);
      
      if( navOption.val() == '#' ) {
        navOption.remove();
      }
    });
    
    //open link
    $("#navigation select").change(function() {
      window.location = $(this).find("option:selected").val();
    });

    //uniform
    $(function(){
      $("#navigation select").uniform();
    });
  
  }); // END doc ready
}); // END function