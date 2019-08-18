{% extends 'layouts/users.volt' %}
 {% block subhead %}
	 <div class="col" align="left">
		 <h5>Огляд користувачів</h5>
	 </div>
 {% endblock %}
{% block content %}

	{{ super() }}
	<table class="table middle_row">
		<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Логін</th>
			<th scope="col">Ім"я</th>
			<th scope="col">Призвище</th>
			<th scope="col">Емейл</th>
			<th scope="col">Дії</th>
		</tr>
		</thead>
		<tbody>
		{% if users is not empty %}
			{% for user in  users %}
				<tr id="{{ user.id }}">
					<td>
						<input type="checkbox" data-key="{{ user.id }}"> <i>{{ user.id }}</i>
					</td>
					<td>
						{{ user.login }}
					</td>
					<td>
						{% if user.name  %}{{ user.name }}{% endif %}
					</td>
					<td>
						{% if user.l_name  %}{{ user.l_name }}{% endif %}
					</td>
					<td>
						{{ user.email }}
					</td>
					<td>
						{{ link_to(['for':'action-edit',"id": user.id, 'controller':router.getControllerName()] ,'Редагувати', 'class':"btn btn-outline-primary") }}
						<button class="btn btn-danger">Видалити</button>
					</td>
				</tr>
			{% endfor %}
		{% endif %}
		</tbody>
	</table>


{% endblock %}
