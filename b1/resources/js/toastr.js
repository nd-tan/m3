import '~toastr/build/toastr.min.js';
toastr.options = {
  tapToDismiss: true,
  toastClass: 'toast',
  containerId: 'toast-container',
  debug: false,
  fadeIn: 300,
  fadeOut: 1000,
  extendedTimeOut: 10000,
  iconClass: 'toast-info',
  positionClass: 'toast-top-right',
  timeOut: 5000, // Set timeOut to 0 to make it sticky
  titleClass: 'toast-title',
  messageClass: 'toast-message',
  progressBar: true
}
