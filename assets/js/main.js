document.addEventListener('DOMContentLoaded', () => {
	// header

	const header = document.querySelector('.header')

	window.addEventListener('scroll', () => {
		const scrolled = window.scrollY

		scrolled > 0 ? header.classList.add('header_sm') : header.classList.remove('header_sm')
	})

	// alert

	const alerts = document.querySelectorAll('.alert')

	alerts.forEach(alert => {
		const close = alert.querySelector('.btn-close')

		close.addEventListener('click', () => alert.classList.add('alert_closed'))
	})
})