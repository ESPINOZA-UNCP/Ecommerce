from email import message
from django.shortcuts import redirect, render
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from tourr.form import RegisterForm

# Create your views here.

def index(request):
    
    return render(request, 'index.html',{
        'title': 'TE DAMOS LA BIENVENIDA AL SERVICIO DE TOURS',
        'content': 'Bienvenido al servicio de tours, aqui podras encontrar todos los tours que tenemos para ti',
    })

def login_view(request):
    if request.user.is_authenticated:
        return redirect('/inicio')
    else:
        if request.method == 'POST':
            email = request.POST.get('email')
            password = request.POST.get('password')

            user = authenticate(request,email=email, password=password)
            if user is not None:
                login(request, user)
                user_name= request.user.name
                messages.success(request, f'Bienvenido {user_name} ', extra_tags='alert alert-success')
                return redirect('/inicio')
            else:
                messages.error(request, 'Credenciales incorrectas', extra_tags='alert alert-danger')
                return redirect('/login')
        return render(request, 'login.html',{
            'title': 'Login',
        })

def logout_view(request):
    logout(request)
    return redirect('/inicio')

def register_view(request):
    if request.user.is_authenticated:
        return redirect('/inicio')
    else:
        register_form = RegisterForm(request.POST)

        if request.method == 'POST':
            register_form = RegisterForm(request.POST)

            if register_form.is_valid():
                register_form.save()
                username = register_form.cleaned_data['name']
                message.success(request, f'Usuario {username} creado con éxito', extra_tags='alert alert-success')
                return redirect('/login')
        return render(request , 'register.html',{
            'title': 'Registro',
            'register_form': register_form,
            'consulta':'register'
        })