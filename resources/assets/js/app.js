autosize($('textarea'));


$('#created-at').mask('00/00/0000');
$('#birthdate').mask('00/00/0000');
$('#evaluation-date').mask('00/00/0000');
$('#zipcode').mask('00000-000');
$('#phone').mask('(00) 0 0000-0000');


function debounce(fn, delay) {
  var timer = null;
  return function () {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
          fn.apply(context, args);
      }, delay);
  };
}

$('#search').keyup(debounce(
  function () {
    $('#search').parent().submit();
  }, 800)
);

$('#delete').click(function(e) {
  e.preventDefault(0)
  var res = confirm('Certeza que deseja deletar?');
  if (res) {
    $('#delete-form').submit();
  }
})

$('.print').click(function(e) {
  e.preventDefault()

  var url = window.location.origin
  var args = {}
  var ev = []

  if ($('#print-evaluation').prop('checked')) {
    $.extend(args, {'evaluation' : true})
  }

  $('.print-evolution').each(function(i, val) {
    if($(this).prop('checked')) {
      ev[i] = $(this).prop('id')
    }
  })
  console.log(ev)
  $.extend(args, {'evolutions' : ev})
  url += '/avaliacao/' + $('#evaluation-id').val() + '?' + $.param(args)
  window.open(url, '_blank');
})

