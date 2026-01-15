import TomSelect from 'tom-select';

export default class TomSelectExtension {
	initialize(naja) {
		const tomSelect = (el) => {
			el.querySelectorAll('.select-tom').forEach(e => {
				const isLocked = e.hasAttribute('data-locked');

				e._tom = new TomSelect(e, {
					plugins: isLocked ? [] : ['remove_button'],
				});

				if (isLocked) {
					e._tom.lock();
				}
			});
		};

		tomSelect(document);
		naja.snippetHandler.addEventListener('afterUpdate', (e) => {
			tomSelect(e.detail.snippet);
		});
	}
}
