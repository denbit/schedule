{% block mainForm %}
	<div class="form_login" id="form_login">
		<div class="formHeader">
			<span>{{ translate('log_in','Log in') }}</span>
		</div>
		<input type="text" class="control my-2" placeholder="{{ translate('email','E-mail') }}">
		<input type="password" class="control my-2" placeholder="{{ translate('password','Enter password') }}">
		<div class="custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="remember">
			<label class="custom-control-label checkbox"
				   for="remember">{{ translate('remember','Remember me') }}</label>
			<div class="restore">{{ translate('restore','restore password') }}</div>
		</div>
		<button type="button" class="btn btn-block orange small my-2">{{ translate('log_in','Log in') }}</button>
		<div class="have_not_account">
			<span>{{ translate('have_not_account', 'Do not have an account yet?') }}</span>
		</div>
		<button type="button" class="btn btn-block orange small my-2">{{ translate('sign_up','Sign Up') }}</button>
	</div>

	{#	<div class="registration_form ">#}
	{#		<span class="formHeader">{{ translate('registration','Registration') }}</span>#}
	{#		<input type="text" class="control my-2" placeholder="{{ translate('name_surname','Surname and name') }}">#}
	{#		<input type="text" class="control my-2" placeholder="{{ translate('email','E-mail') }}">#}
	{#		<input type="password" class="control my-2" placeholder="{{ translate('password','Enter password') }}">#}
	{#		<input type="password" class="control my-2" placeholder="{{ translate('password_confirm','Confirm password') }}">#}
	{#		<button type="button" class="btn btn-block orange small my-2">{{ translate('sign_up','Sign Up') }}</button>#}
	{#		<small>{{ translate('already_registered,','If you are already registered,') }} <a href="#">{{ translate('log_in','Log in') }}</a> </small>#}
	{#	</div>#}
{% endblock %}