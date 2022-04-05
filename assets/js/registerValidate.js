document.addEventListener('DOMContentLoaded', () => {
	const form = document.getElementById('register-form')
	const name = document.getElementsByName('name')
	const login = document.getElementsByName('login')
	const email = document.getElementsByName('email')
	const password = document.getElementsByName('password')
	const passwordRepeat = document.getElementsByName('password-repeat')
	const privacy = document.getElementsByName('privacy')

	form.addEventListener('submit', e => {
		e.preventDefault()
	})
})