(function($) {
	var ajaxUrl = ninja_feedback_config.ajax_url;
	var terms = ninja_feedback_config.feedback_types;

	var isArray = function(argument) {
		return Object.prototype.toString.call(argument) == '[object Array]';
	}

	var fetchFeedbackByCategories = function(categories) {
		return $.getJSON(ajaxUrl, {
			action: 'get.feedback.by.category',
			category: isArray(categories) ? categories.join() : categories
		});
	}

	var types = $('#feedback-types');
	$.each(terms, function(key, val) {
		var id = key+1;
		var label = $('<label />', { 'for': 'cb-'+id, text: val });
		var cb = $('<input/>', {
			type: 'radio',
			'value': val,
			id: 'cb-'+id,
			name: 'feedback_type'
		});
		var div = $('<div/>').append(label, cb).appendTo(types);
	});

	types.on('change', ':radio', function(e) {
		fetchFeedbackByCategories($(this).val())
		.then(function(response) {
			var list = $('#feedback-list').empty();
			$.each(response, function(key, post) {
				var content = $('<div/>', {
					style: 'margin:10px 0',
					html: post.post_content
				});
				list.append(content, $('<hr/>'));
			});
		});
	}).find(':radio:first').trigger('click');

})(jQuery);
