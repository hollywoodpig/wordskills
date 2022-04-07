document.addEventListener('DOMContentLoaded', () => {
	// vars

	const form = document.getElementById('register-form')
	const name = document.getElementById('name')
	const login = document.getElementById('login')
	const email = document.getElementById('email')
	const password = document.getElementById('password')
	const passwordRepeat = document.getElementById('password-repeat')
	const privacy = document.getElementById('privacy')

	const alert = document.querySelector('.alert')
	const alertText = alert.querySelector('.alert__text')

	// utils

	const error = (text, elem) => {
		alert.classList.remove('alert_closed')
		alertText.textContent = text

		if (elem) elem.classList.add('input_danger')
	}

	const restore = elem => {
		alert.classList.add('alert_closed')
		elem.classList.remove('input_danger')
	}

	const getloginUnique = async login => {
		return fetch('/api/loginUnique.php', {
			method: 'POST',
			body: JSON.stringify({ login })
		})
			.then(res => res.json())
			.then(data => data)
	}

	const register = async (name, login, email, password) => {
		return fetch('/actions/register.php', {
			method: 'POST',
			body: JSON.stringify({
				name,
				login,
				email,
				password
			})
		})
	}

	// validate

	const validate = async e => {
		e.preventDefault()

		// name

		const isNameCorrect = /[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]/.test(name.value)

		if (!isNameCorrect) {
			error('ФИО заполнено некорректно. ФИО должны быть на кириллице и разделяться пробелами или дефисами.', name)
			return
		} else {
			restore(name)
		}

		// login

		const isLoginLatin = /^[a-zA-Z0-9]+$/.test(login.value)
		const { isLoginUnique } = await getloginUnique(login.value)
		
		if (!isLoginLatin) {
			error('Логин заполнен некорректно. У логина должны использоваться только латинские символы.', login)
			return
		} else if (!isLoginUnique) {
			error('Логин должен быть уникальным. Попробуйте ввести что-то другое.', login)
			return
		} else {
			restore(login)
		}

		// email

		const isEmailCorrect = /\S+@\S+\.\S+/.test(email.value)

		if (!isEmailCorrect) {
			error('Почта введена некорректно. Проверьте правильность написания.', email)
			return
		} else {
			restore(email)
		}

		// password

		if (!password.value) {
			error('Пароль не может быть пустым...', password)
			return
		} else {
			restore(password)
		}

		// password repeat

		const passwordsMatch = password.value === passwordRepeat.value

		if (!passwordsMatch) {
			error('Пароли не совпадают. Проверьте правильность их написания.', passwordRepeat)
			return
		} else {
			restore(passwordRepeat)
		}

		// privacy

		if (!privacy.checked) {
			error('Пожалуйста, согласитесь на продажу ваших данных.')
			return
		}

		// submit

		register(name.value, login.value, email.value, password.value)
		window.location.href = '/login.php'
	}

	form.addEventListener('submit', e => {
		validate(e)
	})
})
