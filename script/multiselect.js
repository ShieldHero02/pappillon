$(function() {
    $('[role="select"]').each(function() {
      var e = this;
      $(e).html('<div role="field"></div><div role="list">' + $(e).html() + '</div>');
      var field = $(this).find('[role="field"]'), 
        list = $(this).find('[role="list"]'); 
      $(e).val(''); 
      if (list.find('option[selected]').length > 0) {
        list.find('option[selected]').each(function() {
          var val = $(this).attr('value') || $(this).text(); 
          if ($(e).val() == '') {
            $(e).val(val); 
          } else {
            $(e).val($(e).val() + ',' + val); 
          };
          var tag = $('<span role="tag">' + $(this).text() + ' <span role="remove">x</span></span>'); 
          tag.prop('index', $(this).index()).val(val); 
          field.append(tag); 
          $(this).hide(); 
        });
      };
      $(e).on('click', 'option', function() {
        var val = $(this).attr('value') || $(this).text(), 
          valArr = $(e).val().split(',');
        if(valArr.indexOf(val) == -1){
          if ($(e).val() == '') {
            $(e).val(val);
          } else {
            $(e).val($(e).val() + ',' + val);
          };
          var tag = $('<span role="tag">' + $(this).text() + ' <span role="remove">x</span></span>'); 
          tag.prop('index', $(this).index()).val(val);
          field.append(tag); 
          $(this).hide(); 
          list.hide();
        };
      }).on('click', '[role="field"]', function() {
        list.toggle();
      }).on('click', '[role="remove"]', function() {
        var optInx = $(this).parent('[role="tag"]').prop('index'),
            val = $(this).parent('[role="tag"]').val(); 
        $(this).parent('[role="tag"]').remove();
        list.find('option').eq(optInx).show();
        var valArr = $(e).val().split(',');
        valArr.splice(valArr.indexOf(val),1);
        $(e).val(valArr.join(','));
      });
    });

    $(document).click(function(e) {

      if($(e.target).closest('[role="field"]').length == 0){
        $('[role="list"]').hide();
      };
    });
  });
  
  $(function() {
    $('button').click(function() {
      console.log($('[role="select"]').val());
    });
  });