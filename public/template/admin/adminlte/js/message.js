function message(message,type) {
  icon = 'fas fa-check';
  if (type != 'success') {
    type = 'danger';
    icon = 'fas fa-times';
  }
  
$.notify({
  // options
  icon: icon,
  message: message,
},{
  // settings
  element: 'body',
  position: null,
  type: type,
  allow_dismiss: true,
  newest_on_top: false,
  showProgressbar: false,
  placement: {
    from: "top",
    align: "right"
  },
  offset: 20,
  spacing: 10,
  z_index: 99999,
  delay: 1500,
  timer: 1000,
  mouse_over: null,
  animate: {
    enter: 'animated fadeInDown',
    exit: 'animated fadeOutUp'
  },
  onShow: null,
  onShown: null,
  onClose: null,
  onClosed: null,
  icon_type: 'class',
  template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    '<span data-notify="icon"></span> ' +
    '<span data-notify="title">{1}</span> ' +
    '<span data-notify="message">{2}</span>' +
    '<div class="progress" data-notify="progressbar">' +
      '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
    '</div>' +
    '<a href="{3}" target="{4}" data-notify="url"></a>' +
  '</div>' 
});
}
