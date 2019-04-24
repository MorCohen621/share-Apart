$(() => {

	getItems();
	//  main button click function
	$('button#create-task').on('click', function () {

		// remove nothing message
		if ('.nothing-message') {
			$('.nothing-message').hide('slide', { direction: 'left' }, 300)
		}

		// create the new li from the form input
		var task = $('input[name=task-insert]').val();
		var newTask = '<li>' + '<p>' + task + '</p>' + '</li>'

		// clear form when button is pressed
		$('input').val('');

		// Alert if the form in submitted empty
		if (task.length === 0) {
			alert('please enter an item');
			return;
		}
		$('#task-list').append(newTask);

		//postItem();

		// makes other controls fade in when first task is created
		$('#controls').fadeIn();
		$('.task-headline').fadeIn();
	});

	// mark as complete
	$(document).on('click', 'li', function () {
		$(this).toggleClass('complete');
	});

	// double click to remove
	$(document).on('dblclick', 'li', function () {
		//deleteItem($(this).text());
		$(this).remove();
	});

	// Clear all tasks button
	$('button#clear-all-tasks').on('click', function () {
		$('#task-list li').remove();
		$('.task-headline').fadeOut();
		$('#controls').fadeOut();
		$('.nothing-message').show('fast');
	});
});

const getItems = () => {

	const phpFile = './items.php';

	$.ajax({
		url: phpFile,
		method: 'GET',
		success: (data) => {
			console.log(data);
			values = data;
			renderDBItems();
		},
		error: () => { console.log('error') }
	});
}

// TODO: ADD LOGIC WHERE NEEDED
const postItem = () => {
	const url = '' // TODO: INSERT RELEVANT URL!!

	const item = {
		apartment_id: '', 	// TODO: INSERT USER APARTMENT ID
		item_name: $('input[name=task-insert]').val()
	}

	$.ajax({
		url: url,
		method: 'POST',
		success: (data) => {
			getItems();
		},
		error: () => {
			console.log('error')
		},
		data: item
	});
}

const deleteItem = (itemName) =>{
	const url = '' // TODO: INSERT RELEVANT URL!!

	$.ajax({
		url: url,
		method: 'DELETE',
		success: (data) => {
			alert('deleted')
		},
		error: () => {
			console.log('error')
		}
	});
}

const renderDBItems = () => {
	values.map(val => {
		// create the new li from the form input
		var newTask = '<li>' + '<p>' + val + '</p>' + '</li>'
		$('#task-list').append(newTask);

		// makes other controls fade in when first task is created
		$('#controls').fadeIn();
		$('.task-headline').fadeIn();
	}
	)
}
