function changePage(page){
$('input[name=filter_page]').val(page);
$('#adminForm').submit();
}

function sortList(column, order){
$('input[name=filter_column]').val(column);
$('input[name=filter_column_dir]').val(order);
$('#adminForm').submit();
}

function filterStatus(status) {
  $('input[name=filter_status]').val(status);
  $('#adminForm').submit();
}

function submitForm(){
  $('#adminForm').submit();
}
$(document).ready(function() {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
	$.widget.bridge('uibutton', $.ui.button);
  $("div.card.message").fadeTo(2000, 500).slideUp(500, function(){
  $(".div.card.message").slideUp(500);
	});

  var url    = window.location.href;
  var matchesAction = url.match(/action=([^&]*)/);
  var action = matchesAction[1];
  if (action == 'form') action = 'add';
  var matchesController = url.match(/controller=([^&]*)/);
  var controller = matchesController[1];
  var child = document.querySelectorAll('ul.nav li.nav-item a.nav-link');
  //var parent = document.querySelectorAll('li.nav-item.has-treeview.parent');
  child.forEach(element => {
    var childName = element.firstElementChild.nextElementSibling.textContent.trim().toLowerCase();
    if(childName == action) {
      var parent = element.parentElement.parentElement.parentElement.firstElementChild;
      if(parent.tagName != 'A') {
        element.classList.add('active');
      }else {
        if(parent.textContent.trim().toLowerCase() == controller) {
        element.classList.add('active');
        parent.classList.add('active');
        parent.parentElement.classList.add('menu-open');
        }
      }
    }
  });
  
});