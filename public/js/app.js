$(document).ready(function(){

  //for nav
  $('.sidenav').sidenav();

  //for bugs/create
  $('#bug-chips').chips({
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: 5,
    },
    placeholder: 'Tags',
  });
  //for bugs/create
  $('#assignee-chips').chips({
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: 5,
    },
    placeholder: 'Assignees',
  });
  $('#bug-description').characterCounter();
  $(document).ready(function(){
    $('select').formSelect();
  });
  $('.close').on('click',function(event){
    if ($(this).parent().hasClass('alert')) {
      $(this).parent().remove();
      event.stopPropagation();
    }

  });
});
