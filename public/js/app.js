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
    instance.chipsData.forEach(function(chip){
      $('<input>').attr({
          type: 'hidden',
          value: chip.tag,
          name: 'tags[]'
      }).appendTo('#bug-form');
    });
  });

  $('#post-comment').on('submit',function(e){
    e.preventDefault();
    $.ajax({
      url: '/comments',
      type: 'POST',
      dataType: 'JSON',
      data: $(this).serialize()
    }).done(function(data) {
      if (data.content) {
        var commentClone = $('#comment-template').clone();
        commentClone.removeAttr('id');
        commentClone.attr('data-commentid',data.id);
        commentClone.find('.comment-content').text(data.content);
        commentClone.appendTo($('#comments-container'));
        $('#post-comment textarea').val('');
        $('#comment-count').text(parseInt($('#comment-count').text())+1);
      }
      // console.log("success");
    }).fail(function() {
      console.log("error");
    }).always(function() {
      console.log("complete");
    });

  });
  $('#bug-description').characterCounter();
  $(document).ready(function(){
    $('select').formSelect();
  });
  $('.alert .close').on('click',function(event){
    $(this).parent().remove();
    event.stopPropagation();
  });
  $('.focus-textarea').on('click',function(){
    $(this).find('textarea').focus();
  });
  $('.carousel').carousel();
});
