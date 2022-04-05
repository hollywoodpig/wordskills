document.addEventListener('DOMContentLoaded', () => {
	// modal

	const modalTriggers = document.querySelectorAll('[data-modal-open]')

	modalTriggers.forEach(modalTrigger => {
		const modalId = modalTrigger.getAttribute('data-modal-open')

		modalTrigger.addEventListener('click', e => {
			e.preventDefault()

			const modal = document.getElementById(modalId)
			const modalCloseTriggers = modal.querySelectorAll('[data-modal-close]')

			modal.classList.add('active')

			modalCloseTriggers.forEach(trigger => {
				const removeActiveClass = e => {
					e.preventDefault()

					modal.classList.remove('active')
					trigger.removeEventListener('click', removeActiveClass)
				}

				trigger.addEventListener('click', removeActiveClass)
			})
		})
	})

	// app cancel form

	const appCancelTriggers = document.querySelectorAll('[data-modal-open="app-cancel"]')

	appCancelTriggers.forEach(trigger => {
		const id = trigger.getAttribute('data-app-id')

		trigger.addEventListener('click', e => {
			e.preventDefault()

			const input = document.getElementById('app-cancel-id')
			input.value = id
		})
	})

	// app cancel form

	const appApproveTriggers = document.querySelectorAll('[data-modal-open="app-approve"]')

	appApproveTriggers.forEach(trigger => {
		const id = trigger.getAttribute('data-app-id')

		trigger.addEventListener('click', e => {
			e.preventDefault()

			const input = document.getElementById('app-approve-id')
			input.value = id
		})
	})

		// app category delete form

		const appCategoryDeleteTriggers = document.querySelectorAll('[data-modal-open="app-category-delete"]')

		appCategoryDeleteTriggers.forEach(trigger => {
			const id = trigger.getAttribute('data-app-id')
	
			trigger.addEventListener('click', e => {
				e.preventDefault()
	
				const input = document.getElementById('app-category-delete-id')
				input.value = id
			})
		})

		// app delete form

		const appDeleteTriggers = document.querySelectorAll('[data-modal-open="app-delete"]')

		appDeleteTriggers.forEach(trigger => {
			const id = trigger.getAttribute('data-app-id')
	
			trigger.addEventListener('click', e => {
				e.preventDefault()
	
				const input = document.getElementById('app-delete-id')
				input.value = id
			})
		})
})