$(document).ready(function(){

  //for nav
  $('.sidenav').sidenav();
  function getChips(){
    var arr = [];
    $("#bug-chips").find('data').each(function(a,b){
      var tagObj = {};

      tagObj['tag'] = $(b).val();
      arr.push(tagObj);
    })
    return arr;
  }
  //for bugs/create
  $('#bug-chips').chips({
    data: getChips(),
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

  $('.chip').on('click',function(e){
    var target = $(e.target);
    if (target.hasClass('close')) {
      var chip = M.Chips.getInstance(document.querySelector("#bug-chips"));
      chip.deleteChip(target.index());
      console.log(target.index());
      console.log("KILL");
    }
    e.stopPropagation();
  })
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
  $('#bug-form').on('submit',function(e){
    var _form = $(this);
    var instance = M.Chips.getInstance(document.querySelector("#bug-chips"));
    console.log(instance);
    instance.chipsData.forEach(function(chip){
      console.log(chip.tag);
      $('<input>').attr({
          type: 'hidden',
          value: chip.tag,
          name: 'tags[]'
      }).appendTo('#bug-form');
    });
  });
  $('#bug-description').characterCounter();
  $(document).ready(function(){
    $('select').formSelect();
  });
  $('.alert .close').on('click',function(event){
    console.log("CliCK?");
    $(this).parent().remove();
    event.stopPropagation();
  });
  $('.focus-textarea').on('click',function(){
    $(this).find('textarea').focus();
  });
});
