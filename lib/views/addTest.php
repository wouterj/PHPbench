	<div id="content">
		<form action method="post">
			<label>Onderzoek naam: <input type="text" name="researchName"></label>

			<div id="tests">
				<fieldset>
					<legend>Test</legend>
					<label>Naam: <input type="text" name="testName[]"></label><br>
					<label>Code: <textarea name="code[]"></textarea></label>
					<button class="add">Add another test</button>
				</fieldset>
			</div>
			<br>
		</form>
	</div>


	<script src="http://ajax.googleapis.com/ajax/libs/mootools/1.4.1/mootools-yui-compressed.js"></script>
	<script>window.MooTools || document.write(unescape('%3Cscript src="assets/js/mootools.js"%3E%3C/script%3E'));</script>
	<script>
		window.addEvent('domready', function() {
			
			var addBtn = $$('.add'),
				tests = $('tests'),
				fieldset = new Element('fieldset');

			new Element('legend', {
				html : 'Test'
			}).inject(fieldset, 'top');

			new Element('label', {
				html : 'Naam: '				
			}).grab(new Element('input', {
				type : 'text',
				name : 'testName[]'
			})).inject(fieldset);

			new Element('br').inject(fieldset);

			new Element('label', {
				html : 'Code: '				
			}).grab(new Element('textarea', {
				name : 'code[]'
			})).inject(fieldset);

			new Element('button', {
				'class' : 'add',
				html : 'Add another test'
			}).inject(fieldset);

			addBtn.each(function( elem ) {
				elem.addEvent('click', function() {
					tests.grab(fieldset, 'bottom')
					return false;
				});
			});

		});
	</script>