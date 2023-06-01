// Скрипт
$(function() {
    $('[role="select"]').each(function() {
      var e = this;
      // Обромляем содержимое в блок и добавляем ещё одно поле для добавления тегов
      $(e).html('<div role="field"></div><div role="list">' + $(e).html() + '</div>');
      var field = $(this).find('[role="field"]'), // Получаем блок с где будут сохраняться теги
        list = $(this).find('[role="list"]'); // Получаем блок с option
      $(e).val(''); // Создаём для элемента [role="select"] значение value
      // Проверяем, есть ли выбранные option
      if (list.find('option[selected]').length > 0) {
        // Если да, то создаём для каждого option функцию
        list.find('option[selected]').each(function() {
          var val = $(this).attr('value') || $(this).text(); // Получаем значение option из атрибута value или, если его нет, из содержимого
          // Проверяем, пустое ли поле с тегами
          if ($(e).val() == '') {
            $(e).val(val); // Если пустое, то просто добавляем значение val
          } else {
            $(e).val($(e).val() + ',' + val); // Если не пустое, то к содержимому добавляем запятую и значение option. Делаем что-то типа массива
          };
          var tag = $('<span role="tag">' + $(this).text() + ' <span role="remove">x</span></span>'); // Создаём тег
          tag.prop('index', $(this).index()).val(val); // Записываем в него индекс соответствующего option и 
          field.append(tag); // Добавляем тег в конец поля
          $(this).hide(); // Скрываем элемент option
        });
      };
      // Создаём функцию нажатия на option
      $(e).on('click', 'option', function() {
        var val = $(this).attr('value') || $(this).text(), // Получаем значение value элемента option и если его нет, то его содержимое
          valArr = $(e).val().split(','); // Создаём из значения value элемента [role="select"] массив, что бы проверить на наличие элемента
        // Проверяем, добавлено ли уже это значение в value элемента [role="select"], что бы пользователь не мог добавить копию значения
        if(valArr.indexOf(val) == -1){
          // Если значения в value элемента [role="select"] нет, то проверяем value на содержимое. Пустое ли оно
          if ($(e).val() == '') {
            // Если да, то просто добавляем val в value
            $(e).val(val);
          } else {
            // Если value не пустое, то к содержимому добавляем запятую и значение val. Создаём что-то вроде строчного массива
            $(e).val($(e).val() + ',' + val);
          };
          var tag = $('<span role="tag">' + $(this).text() + ' <span role="remove">x</span></span>'); // Создаём тег
          tag.prop('index', $(this).index()).val(val); // Записываем в тег индекс элемента option, на который нажали и его val
          field.append(tag); // Добавляем тег в конец поля
          $(this).hide(); // Прячем option
          list.hide(); // Скрываем список с option, для эффекта :)
        };
      // Создаём функцию нажатия на поле с тегами
      }).on('click', '[role="field"]', function() {
        list.toggle(); // Открываем или закрываем список с option при нажатии на поле с тегами
      // Создаём функцию удаления тега из списка при нажатии на [role="remove"]
      }).on('click', '[role="remove"]', function() {
        var optInx = $(this).parent('[role="tag"]').prop('index'), // Получаем из тега индекс соответствующего option
            val = $(this).parent('[role="tag"]').val(); // Получаем из тега value соответствующего option
        $(this).parent('[role="tag"]').remove(); // Удаляем тег
        list.find('option').eq(optInx).show(); // Ищем нужный option по индексу и показываем его
        var valArr = $(e).val().split(','); // Создаём из значений value элемента [role="select"] массив для удаления значения
        valArr.splice(valArr.indexOf(val),1); // С помощью функции indexOf ищем положение нужно value в массиве и удаляем его
        $(e).val(valArr.join(',')); // Создаём из массива строку и переписываем значение value в [role="select"]
      });
    });
    // Создаём функцию нажатия на любой элемент сайта
    $(document).click(function(e) {
      // Проверяем, нажатие было на элемент [role="field"] или нет
      if($(e.target).closest('[role="field"]').length == 0){
        // Если нет, то скрываем список option
        $('[role="list"]').hide();
      };
      
      // Проверять нужно потому, что у нас уже есть событие нажатия на [role="field"] и что бы не возникло "противоречий"
    });
  });
  
  // Проверка значение
  $(function() {
    $('button').click(function() {
      console.log($('[role="select"]').val());
    });
  });