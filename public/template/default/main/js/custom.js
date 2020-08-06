function changePage(page){
$('input[name=filter_page]').val(page);
$('#adminForm').submit();
}

function submitForm(){
  $('#adminForm').submit();
}

$(document).ready(function() {
  var url    = window.location.href;
  var matchesController = url.match(/controller=([^&]*)/);
  if(matchesController == null) {
    var controller = 'home';
  } else {
    var controller = matchesController[1];
  }
  
  if(controller == 'index') controller = 'home';
 
  var li = document.querySelectorAll('div.menu-area nav ul li');
  li.forEach(element => {
    console.log(controller==element.textContent.trim().toLowerCase());
    if(element.textContent.trim().toLowerCase() == controller) {
      element.classList.add('active');
    }
  });

 
  var matchesFilter = url.match(/filter=([^&]*)/);
  var filter = matchesFilter[1];
  var sort = document.querySelectorAll("select#sort option");
  sort.forEach(element => {
    if(element.textContent.trim().toLowerCase() == filter) {
      element.selected = 'selected';
    }
  });

  $('[data-fancybox="images"]').fancybox({
    afterLoad : function(instance, current) {
        var pixelRatio = window.devicePixelRatio || 1;

        if ( pixelRatio > 1.5 ) {
            current.width  = current.width  / pixelRatio;
            current.height = current.height / pixelRatio;
        }
    }
});
  
});