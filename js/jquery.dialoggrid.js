/**
 * Функция подставляет параметры выбранной записи в указанные поля формы
 * В гриде первая колонка должна содержать id записи
 * вторая - текст, который будет перенесен в поле формы
 * @param idController id контроллера, которому принадлежит диалог
 * @param idFieldId id поля в которое будет перенесен id выбраной записи
 * @param idFieldName id поля в которое будет перенесен name выбраной записи
 * @return void
 */
$.fn.selectFromGrid = function (idController, idFieldId, idFieldName) {
	
	var yiiGrid = $('#select-' + idController + '-grid');
	if (window.okClicked && yiiGrid.size() > 0 ) {
		window.okClicked = false;
		var row = yiiGrid.find('.selected').children();
		//console.log( yiiGrid.find('.selected').children() );

		// получаем значение ключевого поля выбранной записи
		//var selected = yiiGrid.yiiGridView('getSelection');
		//console.log(selected);
		// Получаем коллекцию элементов выбранной записи
		// т.к. полученный индекс почему-то не совпадает с выбранным
		// делаем selected-1
		//var row = yiiGrid.yiiGridView('getRow', selected-1);
		//console.log(row);

		// обход коллекции и получение необходимых нам значений
		if (row.size() > 0 ) {
			row.each(function(index) {
				//console.log(index + ': ' + $(this).text());
				// id записи подставляем в скрытое поле
				if (index == 0) {
					$('#' + idFieldId).val($(this).text());
				}
				// название записи показываем в форме
				if (index == 1) {
					$('#' + idFieldName).val($(this).text());
				}
			});
		}
	}
};

$(function() {
	// из-за того, что какие-то проблемы с селекторами
	// для определения нажатой кнопки в гриде диалога
	// была добавлена глобальная переменная window.okClicked
	window.okClicked = false;
	$('.okBtn').click(function() {
		window.okClicked = true;
	});
})