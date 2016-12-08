// $('#btn-logout').click(function(){
// 	console.log('demo');
// 	return;
//   event.preventDefault();
//   document.getElementById('logout-form').submit();
// });

$('#btn-logout').on('click', function(){
	event.preventDefault();
  document.getElementById('logout-form').submit();
});